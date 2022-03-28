const Dashboard = () => import("./components/Dashboard.vue");
const RolePermission = () =>
    import("./components/configuration/RolePermission.vue");
const UserList = () => import("./components/configuration/UserList.vue");
const ServiceList = () => import("./components/configuration/ServiceList.vue");

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
    {
        path: "/user-list",
        name: "UserList",
        component: UserList,
    },
    {
        path: "/services",
        name: "ServiceList",
        component: ServiceList,
    },
    { path: "/*", component: Dashboard },
];
