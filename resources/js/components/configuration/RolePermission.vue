<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Role & Permission</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <button
                            type="button"
                            data-toggle="modal"
                            data-target="#role-permission-modal"
                            class="btn btn-outline-primary"
                        >
                            <i class="fa fa-plus mr-1"></i>
                            Add Role & Permission
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
                            <div class="card-body">
                                <table
                                    id="example1"
                                    class="table table-bordered table-striped"
                                >
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Role Name</th>
                                            <th>Menu Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <add-role ref="role-permission-modal"></add-role>
    </div>
</template>
<script>
import AddRole from "./AddRole.vue";
export default {
    components: {
        AddRole,
    },
    methods: {
        visibleModal() {
            this.$refs.modal.show();
        },
    },
};
</script>
<style lang=""></style>
