import { useState } from "react";
import axios from "axios";
import { TextField, Button, Container, Typography, Box, Paper } from "@mui/material";
import { useNavigate } from "react-router-dom";

export default function Register() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    const navigate = useNavigate();

    async function handleSubmit(e: React.FormEvent) {
        e.preventDefault();
        try {
            const { data } = await axios.post("http://localhost/SistemaDeGestionDeTareas/public/register", {
                email,
                password
            });

            console.log("Usuario registrado correctamente:", data);
            navigate("/login");
        } catch (error: any) {
            if (error.response) {
                console.error("Error al registrar:", error.response.data.error || "Error desconocido");
            } else {
                console.error("Error en la conexión con el servidor");
            }
        }
    }

    function handleRedirectToLogin() {
        navigate("/login");
    }

    return (
        <Container maxWidth="xs" sx={{ display: "flex", justifyContent: "center", alignItems: "center", minHeight: "100vh" }}>
            <Paper elevation={3} sx={{ p: 4, borderRadius: 2, width: "100%", display: "flex", flexDirection: "column", alignItems: "center" }}>
                <Typography variant="h5" gutterBottom>
                    Form Register
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
                    <Button type="submit" variant="contained" color="primary" fullWidth sx={{ mt: 2 }}>
                        Register
                    </Button>
                </Box>

                <Button variant="contained" color="primary" fullWidth sx={{ mt: 2 }} onClick={handleRedirectToLogin}>
                    Ya tienes cuenta? Ir a Login
                </Button>
            </Paper>
        </Container>
    );
}
