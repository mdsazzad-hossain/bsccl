<template>
    <div class="modal fade" id="role-permission-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mr-5">Role & Permission Form</h4>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="overlay" v-if="loading">
                            <i class="fa fa-spinner fa-spin"></i>
                        </div>
                        <div class="card-body">
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmit)">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ValidationProvider
                                                name="Role Name"
                                                rules="required"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label for="name"
                                                        >Role Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        v-model="
                                                            rpData.role_name
                                                        "
                                                        class="form-control"
                                                        id="role_name"
                                                        placeholder="Enter role name"
                                                    />
                                                    <span
                                                        class="invalid-feedback d-block"
                                                        >{{ errors[0] }}</span
                                                    >
                                                </div>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div
                                                class="col-md-4 mb-2"
                                                v-for="(
                                                    item, index
                                                ) in rpData.menus"
                                                :key="index"
                                            >
                                                <div
                                                    class="custom-control custom-checkbox"
                                                >
                                                    <input
                                                        class="custom-control-input"
                                                        type="checkbox"
                                                        v-model="item.m_id"
                                                        :id="'menu' + index"
                                                        :value="index + 1"
                                                    />
                                                    <label
                                                        :for="'menu' + index"
                                                        class="custom-control-label"
                                                        >{{
                                                            item.menu_name
                                                        }}</label
                                                    >
                                                </div>

                                                <div
                                                    class="row mt-2 ml-3"
                                                    v-for="(
                                                        itm, index1
                                                    ) in item.permission"
                                                    :key="index1"
                                                >
                                                    <div class="col-md-12">
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                class="custom-control-input"
                                                                type="checkbox"
                                                                v-model="
                                                                    itm.create
                                                                "
                                                                :id="
                                                                    'per' +
                                                                    index1 +
                                                                    index
                                                                "
                                                                checked=""
                                                            />
                                                            <label
                                                                :for="
                                                                    'per' +
                                                                    index1 +
                                                                    index
                                                                "
                                                                class="custom-control-label"
                                                                >Create</label
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                class="custom-control-input"
                                                                type="checkbox"
                                                                :id="
                                                                    'per2' +
                                                                    index1 +
                                                                    index
                                                                "
                                                                v-model="
                                                                    itm.edit
                                                                "
                                                                checked=""
                                                            />
                                                            <label
                                                                :for="
                                                                    'per2' +
                                                                    index1 +
                                                                    index
                                                                "
                                                                class="custom-control-label"
                                                                >Edit</label
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                class="custom-control-input"
                                                                type="checkbox"
                                                                v-model="
                                                                    itm.update
                                                                "
                                                                :id="
                                                                    'per3' +
                                                                    index1 +
                                                                    index
                                                                "
                                                                checked=""
                                                            />
                                                            <label
                                                                :for="
                                                                    'per3' +
                                                                    index1 +
                                                                    index
                                                                "
                                                                class="custom-control-label"
                                                                >Update</label
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                class="custom-control-input"
                                                                type="checkbox"
                                                                v-model="
                                                                    itm.delete
                                                                "
                                                                :id="
                                                                    'per4' +
                                                                    index1 +
                                                                    index
                                                                "
                                                                checked=""
                                                            />
                                                            <label
                                                                :for="
                                                                    'per4' +
                                                                    index1 +
                                                                    index
                                                                "
                                                                class="custom-control-label"
                                                                >Delete</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </ValidationObserver>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["rpData"],
    data() {
        return {
            loading: false,
            // rpData: {
            //     role_name: "",
            //     menus: [
            //         {
            //             menu_name: "Users",
            //             m_id: "",
            //             permission: [
            //                 {
            //                     create: "",
            //                     edit: "",
            //                     update: "",
            //                     delete: "",
            //                 },
            //             ],
            //         },
            //         {
            //             menu_name: "Services",
            //             m_id: "",
            //             permission: [
            //                 {
            //                     create: "",
            //                     edit: "",
            //                     update: "",
            //                     delete: "",
            //                 },
            //             ],
            //         },
            //     ],
            // },
        };
    },
    methods: {
        onSubmit() {
            this.loading = true;
            axios
                .post("/store-role-permission", this.rpData)
                .then((res) => {
                    this.loading = false;
                    Toast.fire({
                        icon: "success",
                        title: "Data Upload Successfull.",
                    });
                    // window.location.href = "/";
                })
                .catch(() => {
                    this.loading = false;
                    Swal.fire({
                        icon: "warning",
                        title: "wrong creidentials!",
                    });
                });
        },
    },
};
</script>
<style scoped>
.fa-spin {
    font-size: 30px;
    margin-top: 20% !important;
    margin-left: 46%;
}

.card .overlay,
.info-box .overlay,
.overlay-wrapper .overlay,
.small-box .overlay {
    background-color: rgba(221, 221, 221, 0.7) !important;
    display: none !important;
}
</style>
