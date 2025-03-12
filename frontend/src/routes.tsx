import { Routes, Route } from "react-router-dom";
import Home from "./pages/Home";
import DashBoardTask from "./pages/DashBoardTask";
import Login from "./pages/Login";
import Register from "./pages/Register";
import FormCreateTask from "./components/FormCreateTask";

export default function AppRoutes() {
    return (
        <Routes>
            <Route path="/" element={<Register />} />
            <Route path="/login" element={<Login />} />
            <Route path="/Home" element={<Home />} />
            <Route path="/DashBoardTask" element={<DashBoardTask />} />
            <Route path="/CreateTask" element={<FormCreateTask />} />
        </Routes>
    );
}
