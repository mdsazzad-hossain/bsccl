const Dashboard = () => import("./components/Dashboard.vue");
const login = () => import("./components/auth/Login.vue");

export default [
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
    },
    {
        path: "/login",
        name: "login",
        component: login,
    },
];
