const Dashboard = () => import("./components/Dashboard.vue");
const RolePermission = () =>
    import("./components/configuration/RolePermission.vue");

export default [
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
    },
    {
        path: "/role-permission-list",
        name: "RolePermission",
        component: RolePermission,
    },
];
