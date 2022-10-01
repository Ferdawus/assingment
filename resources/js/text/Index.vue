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
                                            <!-- <router-link >Edit</router-link> -->
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
                                        required
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
                                        v-model="form.phone"
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
                                        v-model="form.address"
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
                                        required
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
export default {
    name: "Add",
    data() {
        return {
            clients: [],
            form: {
                name: "",
                email: "",
                phone: "",
                address: "",
            },
            editFrom: {
                id: "",
                name: "",
                email: "",
                phone: "",
                address: "",
            },
        };
    },
    mounted() {
        this.fachData();
        // this.editFrom();
    },
    methods: {
        fachData() {
            axios
                .get("/api/clients/")
                .then((res) => {
                    this.clients = res.data;
                    // console.log(res.data);
                })
                .catch((err) => {
                    console.error(err);
                });
        },
        storeData() {
            // console.log(this.form);

            axios
                .post("/api/clients/", this.form)
                .then((res) => {
                    console.log(res.status);
                    if (res.status === 201) {
                        this.fachData();
                        this.form = "";
                        $("#add_new").modal("hide");
                        // this.clients.value.push(res.data);
                    }
                })
                .catch((err) => {
                    // this.errors = err.response.data.errors;
                    // console.error(err.response.data.errors);
                });
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
