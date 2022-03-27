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
                        <div class="overlay" id="loading">
                            <i class="fa fa-spinner fa-spin"></i>
                        </div>
                        <div class="card-body">
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmit)">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ValidationProvider
                                                name="Role Name"
                                                rules="required|alpha"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label for="name"
                                                        >Role Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        v-model="rpData.name"
                                                        class="form-control"
                                                        id="role_name"
                                                        placeholder="Enter role name"
                                                    />
                                                    <span>{{ errors[0] }}</span>
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
                                                        v-model="item.title"
                                                        :id="'menu' + index"
                                                    />
                                                    <label
                                                        :for="'menu' + index"
                                                        class="custom-control-label"
                                                        >Menu Name</label
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
    data() {
        return {
            rpData: {
                name: "",
                menus: [
                    {
                        title: "",
                        permission: [
                            {
                                create: "",
                                edit: "",
                                update: "",
                                delete: "",
                            },
                        ],
                    },
                    {
                        title: "",
                        permission: [
                            {
                                create: "",
                                edit: "",
                                update: "",
                                delete: "",
                            },
                        ],
                    },
                    {
                        title: "",
                        permission: [
                            {
                                create: "",
                                edit: "",
                                update: "",
                                delete: "",
                            },
                        ],
                    },
                    {
                        title: "",
                        permission: [
                            {
                                create: "",
                                edit: "",
                                update: "",
                                delete: "",
                            },
                        ],
                    },
                    {
                        title: "",
                        permission: [
                            {
                                create: "",
                                edit: "",
                                update: "",
                                delete: "",
                            },
                        ],
                    },
                ],
            },
        };
    },
    methods: {
        storeRole() {
            axios
                .post("/store-role-permission", this.rpData)
                .then((res) => {
                    console.log(res);
                    Toast.fire({
                        icon: "success",
                        title: "Logout Successfull.",
                    });
                    // window.location.href = "/";
                })
                .catch(() => {
                    Swal.fire({
                        icon: "warning",
                        title: "wrong creidentials!",
                    });
                });
        },
    },
};
</script>
<style></style>
