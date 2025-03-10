import { useState } from "react";
import { TextField, Button, Container, Typography, Box, Paper } from "@mui/material";
import { useNavigate } from "react-router-dom";

export default function Register() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    const navigate = useNavigate();

    async function handleSubmit(e: React.FormEvent) {
        e.preventDefault();
        try {
            // Enviar datos al backend
            const response = await fetch("http://localhost/SistemaDeGestionDeTareas/public/register", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ email, password }),
            });

            const result = await response.json();
            if (response.ok) {
                console.log("Usuario registrado correctamente");
                navigate("/login");  // Redirigir al login
            } else {
                console.error("Error al registrar:", result.error || "Error desconocido");
            }
        } catch (error) {
            console.error("Error al registrar:", error);
        }
    }

    function handleRedirectToLogin() {
        navigate("/login"); // Cambia la ruta si tu login está en otra URL
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
