const Dashboard = () => import("./components/Dashboard.vue");
const RolePermission = () =>
    import("./components/configuration/RolePermission.vue");
const UserList = () => import("./components/configuration/UserList.vue");
const ServiceList = () => import("./components/configuration/ServiceList.vue");
const TariffList = () => import("./components/TariffList.vue");
const path = "d3cfdb7594b592d36a0179aaa03c3480";
export default [
    {
        path: path + "/dashboard",
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
    {
        path: "/tariff-list",
        name: "TariffList",
        component: TariffList,
    },
    { path: "/*", component: Dashboard },
];
