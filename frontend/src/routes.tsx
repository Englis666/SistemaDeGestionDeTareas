import { Routes, Route } from "react-router-dom";
import Home from "./pages/Home";
import DashBoardTask from "./pages/DashBoardTask";
import Login from "./pages/Login";
import Register from "./pages/Register";

export default function AppRoutes() {
    return (
        <Routes>
            <Route path="/" element={<Register />} />
            <Route path="/login" element={<Login />} />
            <Route path="/Home" element={<Home />} />
            <Route path="/DashBoardTask" element={<DashBoardTask />} />
        </Routes>
    );
}
