import { useState } from "react";
import axios from "axios";
import { TextField, Button, Container, Typography, Box, Paper } from "@mui/material";
import { useNavigate } from "react-router-dom";

export default function Login() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState<string | null>(null);

    const navigate = useNavigate();

    async function handleSubmit(e: React.FormEvent) {
        e.preventDefault();
        setError(null);

        try {
            const response = await axios.post(
                "http://localhost/SistemaDeGestionDeTareas/public/login",
                { email, password },
                { headers: { "Content-Type": "application/json" } }
            );

            // Si la autenticación es exitosa
            if (response.status === 200) {
                console.log("Inicio de sesión exitoso");
                navigate("/DashBoardTask");
            }
        } catch (error: any) {
            // Manejo de errores
            setError(error.response?.data?.message || "Error al iniciar sesión");
            console.error("Error al iniciar sesión:", error);
        }
    }

    return (
        <Container
            maxWidth="xs"
            sx={{
                display: "flex",
                justifyContent: "center",
                alignItems: "center",
                minHeight: "100vh",
            }}
        >
            <Paper
                elevation={3}
                sx={{
                    p: 4,
                    borderRadius: 2,
                    width: "100%",
                    display: "flex",
                    flexDirection: "column",
                    alignItems: "center",
                }}
            >
                <Typography variant="h5" gutterBottom>
                    Form Login
                </Typography>
                <Box component="form" onSubmit={handleSubmit} sx={{ width: "100%" }}>
                    <TextField
                        fullWidth
                        margin="normal"
                        label="Email"
                        type="email"
                        variant="outlined"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                    />
                    <TextField
                        fullWidth
                        margin="normal"
                        label="Contraseña"
                        type="password"
                        variant="outlined"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                    />
                    <Button
                        type="submit"
                        variant="contained"
                        color="primary"
                        fullWidth
                        sx={{ mt: 2 }}
                    >
                        Login
                    </Button>
                </Box>

                {/* Mostrar error si ocurre */}
                {error && (
                    <Typography color="error" sx={{ mt: 2 }}>
                        {error}
                    </Typography>
                )}
            </Paper>
        </Container>
    );
}
