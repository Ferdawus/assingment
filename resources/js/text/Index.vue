<template>
    <div>
        <!-- <h1>Index Page</h1> -->

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <button
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#add_new"
                    >
                        Add New
                    </button>
                </div>
                <div class="my-2 px-4">
                    <div class="row">
                        <div class="col-md-2">
                            <strong>Search By: </strong>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select
                                    v-model="queryField"
                                    class="form-control"
                                >
                                    <option value="name">Name</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                    <option value="address">Address</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <input
                                type="text"
                                v-model="query"
                                class="form-control"
                                placeholder="Search"
                            />
                        </div>
                        <div class="col-md-2">
                            <button
                                @click="realoadData()"
                                class="btn btn-primary ml-2"
                            >
                                Reload
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(client, index) in clients"
                                        :key="index"
                                    >
                                        <th scope="row">{{ ++index }}</th>
                                        <td>{{ client.name }}</td>
                                        <td>{{ client.email }}</td>
                                        <td>{{ client.phone }}</td>
                                        <td>{{ client.address }}</td>
                                        <td>
                                            <a
                                                class="btn btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit_new"
                                                @click.prevent="
                                                    editData(client.id)
                                                "
                                                >Edit</a
                                            >
                                            <a
                                                href=""
                                                @click.prevent="
                                                    destroy(client.id)
                                                "
                                                class="btn btn-danger ms-3"
                                                >Delete</a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <pagination
                                v-if="pagination.last_page > 1"
                                :pagination="pagination"
                                :offset="5"
                                @paginate="
                                    query === '' ? fachData() : searchData()
                                "
                            >
                            </pagination>
                        </div>
                    </div>
                </div>
            </div>
            <!-- add new -->
            <div
                class="modal fade addNew"
                id="add_new"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Add New
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <!-- {{errors}} -->
                        <form @submit.prevent="storeData()" action="">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder=""
                                        v-model="form.name"
                                    />
                                    <span
                                        v-if="errors.name"
                                        class="text-danger"
                                        >{{ errors.name[0] }}</span
                                    >
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Email</label
                                    >
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        v-model="form.email"
                                    />
                                    <span
                                        v-if="errors.email"
                                        class="text-danger"
                                        >{{ errors.email[0] }}</span
                                    >
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Phone</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="phone"
                                        v-model="form.phone"
                                    />
                                    <span
                                        v-if="errors.phone"
                                        class="text-danger"
                                        >{{ errors.phone[0] }}</span
                                    >
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Address</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="address"
                                        v-model="form.address"
                                    />
                                    <span
                                        v-if="errors.address"
                                        class="text-danger"
                                        >{{ errors.address[0] }}</span
                                    >
                                </div>
                                <div>
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Image</label
                                    >
                                    <input
                                        @change="onChangeImage()"
                                        type="file"
                                        class="form-control"
                                        id="image"
                                    />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Add New
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Btn -->
            <div
                class="modal fade"
                id="edit_new"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                update
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <form @submit.prevent="dataUpdate()" action="">
                            <input
                                type="hidden"
                                v-model="editFrom.id"
                                id="IDEdit"
                            />
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        placeholder=""
                                        v-model="editFrom.name"
                                    />
                                    <span
                                        v-if="errors.name"
                                        class="text-danger"
                                        >{{ errors.name[0] }}</span
                                    >
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Email</label
                                    >
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        v-model="editFrom.email"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Phone</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="phone"
                                        v-model="editFrom.phone"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Address</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="address"
                                        v-model="editFrom.address"
                                    />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import toastr from "toastr";
export default {
    name: "Add",
    data() {
        return {
            query: "",
            queryField: "name",
            clients: [],
            form: {
                name: "",
                email: "",
                phone: "",
                address: "",
                image: "",
            },

            editFrom: {
                id: "",
                name: "",
                email: "",
                phone: "",
                address: "",
            },
            pagination: {
                current_page: 1,
            },
            errors: [],
        };
    },
    watch: {
        query: function (newQ, old) {
            if (newQ === "") {
                this.fachData();
            } else {
                this.searchData();
            }
        },
    },
    mounted() {
        this.fachData();
        // toastr.info('Success')
        // this.editFrom();
    },
    methods: {
        fachData() {
            axios
                .get("/api/clients?page=" + this.pagination.current_page)
                .then((res) => {
                    this.clients = res.data.data;
                    // console.log(this.clients = res.data.data);
                    // console.log(this.pagination = res.data);
                    this.pagination = res.data;
                })
                .catch((err) => {
                    console.error(err.response.data);
                });
        },
        searchData() {
            axios
                .get(
                    "/api/search/client" +
                        "/" +
                        this.queryField +
                        "/" +
                        this.query +
                        "?page=" +
                        this.pagination.current_page
                )
                .then((res) => {
                    this.clients = res.data.data;
                    // console.log(this.clients = res.data.data);
                    // console.log(this.pagination = res.data);
                    this.pagination = res.data;
                })
                .catch((err) => {
                    console.error(err.response.data);
                });
        },
        realoadData() {
            this.fachData();
            this.query = "";
            this.queryField = "name";
        },
        storeData() {
            // console.log(this.form);

            axios
                .post("/api/clients/", this.form)
                .then((res) => {
                    console.log(res.data);
                    if (res.status === 201) {
                        this.fachData();
                        this.form.name = "";
                        this.form.email = "";
                        this.form.phone = "";
                        this.form.address = "";
                        this.form.image = "";
                        this.errors = "";
                        $("#add_new").modal("hide");
                        toastr.success("Client created successfully!");
                        this.clients.value.push(res.data);
                    }
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                    // console.error(err.response.data.errors);
                });
        },
        onChangeImage(e) {
            this.form.image = e.target.files[0];
        },
        editData(id) {
            // console.log(id);
            axios
                .get("/api/clients/" + id)
                .then((res) => {
                    // console.log(res.data)
                    this.editFrom = res.data;
                })
                .catch((err) => {
                    console.error(err);
                });
        },
        dataUpdate() {
            // console.log(this.editFrom);
            axios
                .put("/api/clients/" + this.editFrom.id, this.editFrom)
                .then((res) => {
                    console.log(res);
                    this.fachData();
                    this.editFrom = "";
                    $("#edit_new").modal("hide");
                    toastr.success("Client Updated successfully!");
                })
                .catch((err) => {
                    console.error(err);
                });
        },
        destroy(id) {
            if (!window.confirm("Are you share to deleted")) {
                return;
            }
            axios
                .delete("/api/clients/" + id)
                .then((res) => {
                    if (res.status === 200) {
                        this.fachData();
                        toastr.success("Client Deleted successfully!");
                    }
                })
                .catch((err) => {
                    console.error(err);
                });
        },
    },
};
</script>
<style></style>
