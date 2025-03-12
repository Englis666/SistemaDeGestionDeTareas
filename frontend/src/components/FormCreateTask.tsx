import { useState } from "react";
import { TextField, Button, Container, Typography, Box, Paper } from "@mui/material";
import { useNavigate } from "react-router-dom";

export default function FormCreateTask() {

    const [typeTask, setTypeTask] = useState("");
    const [title, setTitle] = useState("");
    const [description, setDescription] = useState("");
    const [startDate, setStartDate] = useState("");
    const [finishDate, setFinishDate] = useState("");

    const navigate = useNavigate();

    async function handleSubmit(e: React.FormEvent) {
        e.preventDefault();
        try {
            const response = await fetch("http://localhost/SistemaDeGestionDeTareas/public/CreateTask", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ typeTask, title, description, startDate, finishDate }),
            });

            const result = await response.json();
            if (response.ok) {
                alert("Tarea registrada correctamente")
            } else {
                console.error("Error al registrar la tarea", result.error || "Error desconocido");
            }
        } catch (error) {
            console.error("Error al registrar : ", error);
        }

    }


    function handleRedirectToHome() {
        navigate("/DashBoardTask");
    }

    return (

        <Container maxWidth="xs" sx={{ display: "flex", justifyContent: "center", alignItems: "center", minHeight: "100vh" }}>
            <Paper elevation={3} sx={{ p: 4, borderRadius: 2, width: "100%", display: "flex", flexDirection: "column", alignItems: "center" }}>
                <Typography variant="h5" gutterBottom>
                    Form 4 Create Task
                </Typography>

                <Box component="form" onSubmit={handleSubmit} sx={{ width: "100%" }}>
                    <TextField
                        fullWidth
                        margin="normal"
                        label="Type of task"
                        type="text"
                        variant="outlined"
                        value={title}
                        onChange={(e) => setTypeTask(e.target.value)}
                    />
                    <TextField
                        fullWidth
                        margin="normal"
                        label="Title of the task"
                        type="text"
                        variant="outlined"
                        value={title}
                        onChange={(e) => setTitle(e.target.value)}
                    />
                    <TextField
                        fullWidth
                        margin="normal"
                        label="Description of the task"
                        type="text"
                        variant="outlined"
                        value={title}
                        onChange={(e) => setDescription(e.target.value)}
                    />
                    <TextField
                        fullWidth
                        margin="normal"
                        label="Day of start at the task"
                        type="text"
                        variant="outlined"
                        value={title}
                        onChange={(e) => setStartDate(e.target.value)}
                    />
                    <TextField
                        fullWidth
                        margin="normal"
                        label="Last date of the task"
                        type="text"
                        variant="outlined"
                        value={title}
                        onChange={(e) => setFinishDate(e.target.value)}
                    />
                    <Button variant="contained" color="primary" fullWidth sx={{ mt: 2 }} onClick={handleSubmit}>
                        Create the task
                    </Button>
                </Box>
                <Button variant="contained" color="primary" fullWidth sx={{ mt: 2 }} onClick={handleRedirectToHome}>
                    Return to List of task
                </Button>


            </Paper>
        </Container>

    );







}
