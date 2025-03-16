import {
    Container,
    Typography,
    Grid,
    Card,
    CardContent,
    CardActions,
    Button
} from "@mui/material";
import TypesOfTask from "./TypesOfTask";


export default function Task() {


    return (
        <Container
            maxWidth={false}
            sx={{
                width: "100vw",
                minHeight: "100vh",
                display: "flex",
                flexDirection: "column",
                alignItems: "center",
                py: 5,
            }}
        >
            <TypesOfTask />

            {/* Todas las Tareas */}
            <Typography variant="h4" color="primary" fontWeight="bold" textAlign="center" mt={5} mb={4}>
                Todas las Tareas
            </Typography>
            <Grid container spacing={3} justifyContent="center" sx={{ width: "90%" }}>
                {[1, 2, 3, 4, 5, 6].map((_, index) => (
                    <Grid item key={index} xs={12} sm={6} md={4} lg={3}>
                        <Card sx={{ boxShadow: 3, borderRadius: 2, flexGrow: 1 }}>
                            <CardContent>
                                <Typography variant="h6" gutterBottom>
                                    Título de la Tarea
                                </Typography>
                                <Typography variant="body1" color="textSecondary" gutterBottom>
                                    Descripción de la tarea.
                                </Typography>
                                <Typography variant="body2" color="textSecondary">
                                    Inicio: 2025-03-08
                                </Typography>
                                <Typography variant="body2" color="textSecondary">
                                    Fin: 2025-03-15
                                </Typography>
                            </CardContent>
                            <CardActions sx={{ justifyContent: "center", pb: 2 }}>
                                <Button variant="contained" color="primary">
                                    Actualizar
                                </Button>
                                <Button variant="outlined" color="error">
                                    Eliminar
                                </Button>
                            </CardActions>
                        </Card>
                    </Grid>
                ))}
            </Grid>
        </Container>
    );
}
