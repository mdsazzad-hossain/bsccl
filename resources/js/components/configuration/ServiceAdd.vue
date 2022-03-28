<template>
    <div class="modal fade" id="service-add-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mr-5">Service Form</h4>
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
                                                name="Name"
                                                rules="required"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label for="name"
                                                        >Service Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        v-model="service.name"
                                                        class="form-control"
                                                        id="name"
                                                        placeholder="Enter name"
                                                    />
                                                    <span
                                                        class="invalid-feedback d-block"
                                                        >{{ errors[0] }}</span
                                                    >
                                                </div>
                                            </ValidationProvider>
                                        </div>
                                        <div
                                            class="col-md-12 d-flex"
                                            v-for="(item, i) in sub_service"
                                            :key="i"
                                        >
                                            <div
                                                class="col-md-11"
                                                style="
                                                    margin-left: -7px !important;
                                                "
                                            >
                                                <ValidationProvider
                                                    name="Sub Service Name"
                                                    rules="required"
                                                    v-slot="{ errors }"
                                                >
                                                    <div class="form-group">
                                                        <label for="sub"
                                                            >Sub Service
                                                            Name</label
                                                        >
                                                        <input
                                                            type="text"
                                                            v-model="
                                                                item.child_name
                                                            "
                                                            class="form-control"
                                                            id="sub"
                                                            placeholder="Sub Service Name"
                                                        />
                                                        <span
                                                            class="invalid-feedback d-block"
                                                            >{{
                                                                errors[0]
                                                            }}</span
                                                        >
                                                    </div>
                                                </ValidationProvider>
                                            </div>
                                            <div
                                                class="col-md-1"
                                                style="margin-top: 5%"
                                            >
                                                <button
                                                    v-if="
                                                        sub_service.length -
                                                            1 ===
                                                        i
                                                    "
                                                    class="btn btn-success btn-sm"
                                                    type="button"
                                                    @click="addItem"
                                                >
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <button
                                                    v-if="
                                                        sub_service.length > 1
                                                    "
                                                    class="btn btn-danger btn-sm"
                                                    type="button"
                                                    @click="removeItem(i)"
                                                >
                                                    <i class="fa fa-times"></i>
                                                </button>
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
            loading: false,
            service: {
                name: "",
                child: [],
            },
            sub_service: [
                {
                    child_name: "",
                },
            ],
        };
    },
    created() {},
    methods: {
        onSubmit() {
            // axios
            //     .post("/store", this.user)
            //     .then((res) => {
            //         this.loading = false;
            //         Toast.fire({
            //             icon: "success",
            //             title: "Data Upload Successfull.",
            //         });
            //         // window.location.href = "/";
            //     })
            //     .catch(() => {
            //         this.loading = false;
            //         Swal.fire({
            //             icon: "warning",
            //             title: "wrong creidentials!",
            //         });
            //     });
        },
        addItem() {
            this.sub_service.push({
                child_name: "",
            });
        },
        removeItem(i) {
            this.sub_service.splice(i, 1);
        },
    },
};
</script>
<style scoped></style>
