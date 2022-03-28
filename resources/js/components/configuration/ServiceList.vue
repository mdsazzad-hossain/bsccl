<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Services List</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <button
                            type="button"
                            data-toggle="modal"
                            data-target="#service-add-modal"
                            class="btn btn-outline-primary"
                        >
                            <i class="fa fa-plus mr-1"></i>
                            Add New Service
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="overlay" v-if="loading">
                                <i class="fa fa-spinner fa-spin"></i>
                            </div>
                            <div class="card-body">
                                <table
                                    id="example1"
                                    class="table table-bordered table-striped"
                                >
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Sub Service</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-if="listData.length == 0"
                                            class="text-center"
                                        >
                                            <td colspan="3"></td>
                                            <span>Data Not Found</span>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr
                                            v-for="(item, index) in listData"
                                            :key="index"
                                        >
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ item.name }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button
                                                    type="button"
                                                    title="View Details"
                                                    class="btn btn-success btn-sm"
                                                >
                                                    <i
                                                        class="fa fa-edit action-btn-font m-0"
                                                    ></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    title="Delete User"
                                                    class="btn btn-danger btn-sm"
                                                >
                                                    <i
                                                        class="fa fa-trash action-btn-font m-0"
                                                        aria-hidden="true"
                                                    ></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <service-add />
    </div>
</template>
<script>
import ServiceAdd from "./ServiceAdd.vue";
export default {
    components: {
        ServiceAdd,
    },
    data() {
        return {
            loading: false,
            listData: [],
        };
    },
    created() {
        this.getServiceList();
    },
    methods: {
        getServiceList() {
            this.loading = true;
            axios.get("/get-service-list").then((response) => {
                this.loading = false;
                this.listData = [];
            });
        },
    },
};
</script>
<style lang=""></style>
