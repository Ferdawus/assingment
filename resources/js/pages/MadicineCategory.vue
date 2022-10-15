<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex">
                <h4>Medicines Category</h4>
                <button
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#addCategory"
                  class="btn btn-sm btn-info offset-8"
                >
                  Add Category
                </button>
              </div>
            </div>
            <div class="card-body">
              <table
                class="table table-bordered border-info table-responsive-lg"
              >
                <thead>
                  <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Medicine Type</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(medicineCategory, index) in medicineCategories"
                    :key="index"
                  >
                    <th scope="row">{{ ++index }}</th>
                    <td>{{ medicineCategory.categoryName }}</td>
                    <td>{{ medicineCategory.medicineType }}</td>
                    <td>
                        <a
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#edit_new"
                        @click.prevent="editData()"
                        >Edit</a
                      >
                      <a
                        href=""
                        @click.prevent="destroy()"
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

      <!-- add Category -->
      <!-- Modal -->
      <div
        class="modal fade"
        id="addCategory"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Medicine Category
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form action="" @submit.prevent="storeData()">
              <div class="modal-body">
                <div class="row">
                  <div class="mb-3">
                    <label for="categoryName" class="form-label"
                      >Category Name</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="categoryName"
                      placeholder="Medicine Category"
                      v-model="form.categoryName"
                    />
                  </div>
                  <div class="mb-3">
                    <label for="medicineType" class="form-label"
                      >Medicine Type</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="medicineType"
                      placeholder="Medicine Type"
                      v-model="form.medicineType"
                    />
                  </div>
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
                  Submit
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
  name: "medicineCategory",
  data() {
    return {
      medicineCategories: [],
      form: {
        categoryName: "",
        medicineType: "",
      },
    };
  },
  mounted() {
    this.fachData();
  },
  methods: {
    fachData() {
      axios
        .get("/api/medicines/category")
        .then((res) => {
          console.log(res.data);
          this.medicineCategories = res.data;
        })
        .catch((err) => {
          console.error(err.response.data);
        });
    },
    storeData() {
      axios.post("/api/medicines/category/",this.form)
      .then((res) => {
        if (res.status === 201) {
            this.fachData();
            this.form.categoryName = "";
            this.form.medicineType = "";
            $("#addCategory").modal("hide");
            toastr.success("Medicine Category Created Successfully!");
          }

      })
      .catch(err => {
        console.error(err); 
      })
    },
  },
};
</script>
<style>
</style>