<template>
    <div class="modal fade" id="user-add-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mr-5">User Form</h4>
                    <p class="bulk-tag" v-if="visibleForm">
                        If you import bulk user data
                        <a @click="visibleAction" href="javascript:void(0)"
                            >Click Here</a
                        >
                    </p>
                    <p class="bulk-tag" v-if="!visibleForm">
                        If you add single user data
                        <a @click="visibleAction" href="javascript:void(0)"
                            >Click Here</a
                        >
                    </p>
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
                        <div class="card-body" v-if="visibleForm">
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(onSubmit)">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ValidationProvider
                                                name="Name"
                                                rules="required"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label for="name"
                                                        >Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        v-model="user.name"
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
                                        <div class="col-md-6">
                                            <ValidationProvider
                                                name="Email address"
                                                rules="required"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label for="email"
                                                        >Email address</label
                                                    >
                                                    <input
                                                        type="email"
                                                        v-model="user.email"
                                                        class="form-control"
                                                        id="email"
                                                        placeholder="Enter email"
                                                    />
                                                    <span
                                                        class="invalid-feedback d-block"
                                                        >{{ errors[0] }}</span
                                                    >
                                                </div>
                                            </ValidationProvider>
                                        </div>
                                        <div class="col-md-6">
                                            <ValidationProvider
                                                name="Phone Number"
                                                rules="required"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label for="phone"
                                                        >Phone Number</label
                                                    >
                                                    <input
                                                        type="number"
                                                        v-model="user.phone"
                                                        class="form-control"
                                                        id="phn-number"
                                                        placeholder="Enter phone number"
                                                    />
                                                    <span
                                                        class="invalid-feedback d-block"
                                                        >{{ errors[0] }}</span
                                                    >
                                                </div>
                                            </ValidationProvider>
                                        </div>
                                        <div class="col-md-6">
                                            <ValidationProvider
                                                name="Password"
                                                rules="required"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label for="password"
                                                        >Password</label
                                                    >
                                                    <input
                                                        type="password"
                                                        v-model="user.password"
                                                        class="form-control"
                                                        id="password"
                                                        placeholder="Enter Password"
                                                    />
                                                    <span
                                                        class="invalid-feedback d-block"
                                                        >{{ errors[0] }}</span
                                                    >
                                                </div>
                                            </ValidationProvider>
                                        </div>
                                        <div class="col-md-6">
                                            <ValidationProvider
                                                name="User Type"
                                                rules="required|min_value:1"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label>User Type</label>
                                                    <select
                                                        class="form-control"
                                                        style="width: 100%"
                                                        v-model="user.type"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                    >
                                                        <option
                                                            selected="selected"
                                                            disabled
                                                        >
                                                            Select type
                                                        </option>
                                                        <option value="1">
                                                            IPLC
                                                        </option>
                                                        <option value="2">
                                                            IP Transit
                                                        </option>
                                                        <option value="3">
                                                            Colocation Service
                                                        </option>
                                                    </select>
                                                    <span
                                                        class="invalid-feedback d-block"
                                                        >{{ errors[0] }}</span
                                                    >
                                                </div>
                                            </ValidationProvider>
                                        </div>
                                        <div class="col-md-6">
                                            <ValidationProvider
                                                name="User Role"
                                                rules="required|min_value:1"
                                                v-slot="{ errors }"
                                            >
                                                <div class="form-group">
                                                    <label>User Role</label>
                                                    <select
                                                        class="form-control"
                                                        style="width: 100%"
                                                        v-model="user.role"
                                                    >
                                                        <option
                                                            value="3"
                                                            selected="selected"
                                                        >
                                                            User
                                                        </option>
                                                        <option value="2">
                                                            Admin
                                                        </option>
                                                        <option value="1">
                                                            Super Admin
                                                        </option>
                                                    </select>
                                                    <span
                                                        class="invalid-feedback d-block"
                                                        >{{ errors[0] }}</span
                                                    >
                                                </div>
                                            </ValidationProvider>
                                        </div>
                                    </div>
                                    <ValidationProvider
                                        name="Address"
                                        rules="required"
                                        v-slot="{ errors }"
                                    >
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input
                                                type="text"
                                                v-model="user.address"
                                                class="form-control"
                                                id="address"
                                                placeholder="Enter your address"
                                            />
                                            <span
                                                class="invalid-feedback d-block"
                                                >{{ errors[0] }}</span
                                            >
                                        </div>
                                    </ValidationProvider>
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
                        <import-user v-if="!visibleForm" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import ImportUser from "./ImportUser.vue";
export default {
    components: {
        ImportUser,
    },
    data() {
        return {
            visibleForm: false,
            user: {
                name: "",
                email: "",
                phone: "",
                password: "",
                type: 0,
                role: 0,
                address: "",
            },
        };
    },
    created() {
        this.visibleForm = true;
    },
    methods: {
        visibleAction() {
            this.visibleForm = !this.visibleForm;
        },
        onSubmit() {},
    },
};
</script>
<style scoped>
.bulk-tag {
    margin-left: 14%;
    margin-bottom: 0px;
    margin-top: 7px;
}
</style>
