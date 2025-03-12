import { AppBar, Toolbar, Typography, Button, Box } from "@mui/material";
import { useNavigate } from "react-router-dom";

export default function Navbar() {
    const navigate = useNavigate();

    const getCookie = (name: string): string | null => {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop()?.split(";").shift() ?? null;
        return null;
    };

    const token = getCookie("auth_token");

    return (
        <AppBar
            position="static"
            color="primary"
            sx={{ width: "100%", maxWidth: "100vw", boxShadow: 3, overflowX: "hidden" }}
        >

            <Toolbar sx={{ justifyContent: "space-between", px: 2 }}>
                {/* Nombre del sistema */}
                <Typography variant="h6" fontWeight="bold">
                    TaN Task
                </Typography>

                {/* Botones de navegación */}
                <Box sx={{ display: "flex", gap: 2 }}>
                    <Button color="inherit" onClick={() => navigate("/")}>
                        Home
                    </Button>
                    <Button color="inherit" onClick={() => navigate("/Tasks")}>
                        My Tasks
                    </Button>
                    <Button color="inherit" onClick={() => navigate("/createTask")}>
                        Create Task
                    </Button>
                </Box>
            </Toolbar>
        </AppBar>
    );
}
