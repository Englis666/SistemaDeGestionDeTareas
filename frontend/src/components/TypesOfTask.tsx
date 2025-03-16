import { useState, useEffect } from "react";
import { Container, Typography, Grid, CardContent, Card } from "@mui/material";
import axios from "axios";

interface TaskType {
    id: number;
    title: string;
    description: string;
}

export default function TypesOfTask() {
    const [tasks, setTasks] = useState<TaskType[]>([]);
    const [error, setError] = useState<string | null>(null);

    useEffect(() => {
        handleLoading();
    }, []);

    async function handleLoading() {
        try {
            const response = await axios.get("http://localhost/SistemaDeGestionDeTareas/public/GetMyTypesOfTask", {
                headers: { "Content-Type": "application/json" },
            });

            if (response.status === 200) {
                console.log("Tareas cargadas");
                setTasks(response.data);
            }
        } catch (error: any) {
            setError(error.response?.data?.message || "Error al obtener los tipos de tareas");
            console.error("Error al obtener los tipos de tarea", error);
        }
    }

    return (
        <Container>
            <Typography variant="h4" color="primary" fontWeight="bold" textAlign="center" mb={4}>
                Tipos de Tareas
            </Typography>

            {error && (
                <Typography color="error" textAlign="center" mb={3}>
                    {error}
                </Typography>
            )}

            <Grid container spacing={3} justifyContent="center">
                {tasks.map((task) => (
                    <Grid item xs={12} sm={6} md={4} lg={3} key={task.id}>
                        <Card sx={{ boxShadow: 3, borderRadius: 2, flexGrow: 1 }}>
                            <CardContent>
                                <Typography variant="h6" gutterBottom>
                                    {task.title}
                                </Typography>
                                <Typography color="textSecondary">{task.description}</Typography>
                            </CardContent>
                        </Card>
                    </Grid>
                ))}
            </Grid>
        </Container>
    );
}
