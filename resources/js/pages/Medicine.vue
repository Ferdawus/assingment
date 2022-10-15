<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex">
                <h4>Medicines Stock</h4>
                <button
                  data-bs-toggle="modal"
                  data-bs-target="#addMedicine"
                  class="btn btn-sm btn-info offset-8"
                >
                  Add Medicine
                </button>
                <router-link to="/purchases" class="btn btn-sm btn-info ms-3"
                  >Purchase</router-link
                >
              </div>
            </div>
            <div class="card-body">
              <table
                class="table table-bordered border-info table-responsive-lg"
              >
                <thead>
                  <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Medicine Name</th>
                    <th scope="col">Strength</th>
                    <th scope="col">Generic</th>
                    <th scope="col">Medicine Category</th>
                    <th scope="col">Medicine Type</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Tax</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(medicine, index) in medicines" :key="index">
                    <th scope="row">{{ ++index }}</th>
                    <td>{{ medicine.medicineName }}</td>
                    <td>{{ medicine.strength }}</td>
                    <td>{{ medicine.generic }}</td>
                    <td>{{ medicine.categoryName }}</td>
                    <td>{{ medicine.medicineType }}</td>
                    <td>{{ medicine.unit }}</td>
                    <td>{{ medicine.tax }}</td>
                    <td>
                      <span
                        @click.prevent="editData(medicine.id)"
                        class="text-info me-2"
                        data-bs-toggle="modal"
                        data-bs-target="#editMedicine"
                        ><font-awesome-icon icon="fa-regular fa-pen-to-square"
                      /></span>
                      <span
                        @click.prevent="deleteData(medicine.id)"
                        class="text-danger"
                      >
                        <font-awesome-icon icon="fa-solid fa-trash-can"
                      /></span>
                    </td>

                    <!-- <td>
                     
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
                    
                    </td> -->
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- medicine add -->
      <div
        class="modal fade"
        id="addMedicine"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info modal-header-sm">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Create A New Medicine
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <!-- add -->
            <form action="" @submit.prevent="storeData()">
              <div class="modal-body">
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="" class="form-label">Barcode</label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="barcode"
                        v-model="form.barcode"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="medicineName" class="form-label"
                        >Medicine Name</label
                      >
                      <span class="text-danger">*</span>
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="medicineName"
                        v-model="form.medicineName"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="strength" class="form-label"> Strength</label
                      ><span class="text-danger">*</span>
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="strength"
                        v-model="form.strength"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="" class="form-label">Medicine Category</label
                      ><span class="text-danger">*</span>
                      <select
                        class="form-select form-select-sm"
                        aria-label="Default select example"
                        v-model="form.medicineCategory"
                      >
                        <option selected>select</option>
                        <option
                          :value="medicine.id"
                          v-for="(medicine, index) in medicines"
                          :key="index"
                        >
                          {{ medicine.categoryName }}
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="medicineName" class="form-label">
                        Medicine Type</label
                      ><span class="text-danger">*</span>
                      <select
                        class="form-select form-select-sm"
                        aria-label="Default select example"
                        v-model="form.medicineType"
                      >
                        <option selected>Select</option>
                        <option
                          :value="medicine.id"
                          v-for="(medicine, index) in medicines"
                          :key="index"
                        >
                          {{ medicine.medicineType }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="generic" class="form-label"
                        >Generic/Group</label
                      >
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="generic"
                        v-model="form.generic"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="medicineCompanay" class="form-label"
                        >Medicine Companay</label
                      ><span class="text-danger">*</span>
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="medicineCompanay"
                        v-model="form.medicineCompanay"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="medicineIndication" class="form-label"
                        >Medicine Indication</label
                      >
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="medicineIndication"
                        v-model="form.medicineIndication"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="unit" class="form-label">Unit</label
                      ><span class="text-danger">*</span>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="unit"
                        v-model="form.unit"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="minLevel" class="form-label">Min Level</label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="minLevel"
                        v-model="form.minLevel"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="reOrderLevel" class="form-label"
                        >Re-Order Level
                      </label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="reOrderLevel"
                        v-model="form.reOrderLevel"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="tax" class="form-label">tax</label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="tax"
                        v-model="form.tax"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="packing" class="form-label">Packing</label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="packing"
                        v-model="form.packing"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="packSize" class="form-label">PackSize </label
                      ><span class="text-danger">*</span>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="packSize"
                        v-model="form.packSize"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="modeOfAction" class="form-label"
                        >Mode Of Action</label
                      >
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="modeOfAction"
                        v-model="form.modeOfAction"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="photo" class="form-label">Photo</label>
                      <input
                        type="file"
                        class="form-control form-control-sm"
                        id="photo"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea
                      class="form-control"
                      id="note"
                      rows="2"
                      v-model="form.note"
                    ></textarea>
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
                  Add Medicine
                </button>
              </div>
            </form>
            <!-- edit -->
          </div>
        </div>
      </div>

      <!-- edit -->
      <div
        class="modal fade"
        id="editMedicine"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info modal-header-sm">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Update Medicine
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>

            <form action="" @submit.prevent="updateData()">
              <div class="modal-body">
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="" class="form-label">Barcode</label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="barcode"
                        v-model="editFrom.barcode"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="medicineName" class="form-label"
                        >Medicine Name</label
                      >
                      <span class="text-danger">*</span>
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="medicineName"
                        v-model="editFrom.medicineName"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="strength" class="form-label"> Strength</label
                      ><span class="text-danger">*</span>
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="strength"
                        v-model="editFrom.strength"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="" class="form-label">Medicine Category</label
                      ><span class="text-danger">*</span>
                      <select
                        class="form-select form-select-sm"
                        aria-label="Default select example"
                        v-model="editFrom.medicineCategory"
                      >
                        <option selected>select</option>
                        <option
                          :value="medicine.id"
                          v-for="(medicine, index) in medicines"
                          :key="index"
                        >
                          {{ medicine.categoryName }}
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="medicineName" class="form-label">
                        Medicine Type</label
                      ><span class="text-danger">*</span>
                      <select
                        class="form-select form-select-sm"
                        aria-label="Default select example"
                        v-model="editFrom.medicineType"
                      >
                        <option selected>Select</option>
                        <option
                          :value="medicine.id"
                          v-for="(medicine, index) in medicines"
                          :key="index"
                        >
                          {{ medicine.medicineType }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="generic" class="form-label"
                        >Generic/Group</label
                      >
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="generic"
                        v-model="editFrom.generic"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="medicineCompanay" class="form-label"
                        >Medicine Companay</label
                      ><span class="text-danger">*</span>
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="medicineCompanay"
                        v-model="editFrom.medicineCompanay"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="medicineIndication" class="form-label"
                        >Medicine Indication</label
                      >
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="medicineIndication"
                        v-model="editFrom.medicineIndication"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="unit" class="form-label">Unit</label
                      ><span class="text-danger">*</span>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="unit"
                        v-model="editFrom.unit"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="minLevel" class="form-label">Min Level</label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="minLevel"
                        v-model="editFrom.minLevel"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="reOrderLevel" class="form-label"
                        >Re-Order Level
                      </label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="reOrderLevel"
                        v-model="editFrom.reOrderLevel"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="tax" class="form-label">tax</label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="tax"
                        v-model="editFrom.tax"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="packing" class="form-label">Packing</label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="packing"
                        v-model="editFrom.packing"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="packSize" class="form-label">PackSize </label
                      ><span class="text-danger">*</span>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                        id="packSize"
                        v-model="editFrom.packSize"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="modeOfAction" class="form-label"
                        >Mode Of Action</label
                      >
                      <input
                        type="text"
                        class="form-control form-control-sm"
                        id="modeOfAction"
                        v-model="editFrom.modeOfAction"
                      />
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="photo" class="form-label">Photo</label>
                      <input
                        type="file"
                        class="form-control form-control-sm"
                        id="photo"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea
                      class="form-control"
                      id="note"
                      rows="2"
                      v-model="editFrom.note"
                    ></textarea>
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
                  Update Medicine
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
  name: "Medicine",
  data() {
    return {
      medicines: [],
      form: {
        barcode: "",
        medicineName: "",
        strength: "",
        medicineCategory: "",
        medicineType: "",
        generic: "",
        medicineCompanay: "",
        medicineIndication: "",
        unit: "",
        minLevel: "",
        reOrderLevel: "",
        tax: "",
        packing: "",
        packSize: "",
        modeOfAction: "",
        photo: "",
        note: "",
      },
      editFrom: {
        id:"",
        barcode: "",
        medicineName: "",
        strength: "",
        medicineCategory: "",
        medicineType: "",
        generic: "",
        medicineCompanay: "",
        medicineIndication: "",
        unit: "",
        minLevel: "",
        reOrderLevel: "",
        tax: "",
        packing: "",
        packSize: "",
        modeOfAction: "",
        photo: "",
        note: "",
      },
    };
  },
  mounted() {
    this.fatchData();
  },
  methods: {
    fatchData() {
      axios
        .get("/api/medicine")
        .then((res) => {
          // console.log(res.data);
          this.medicines = res.data;
        })
        .catch((err) => {
          console.error(err);
        });
    },
    storeData() {
      axios
        .post("/api/medicine", this.form)
        .then((res) => {
          console.log(res.data);
          if (res.status === 201) {
            this.fatchData();
            this.form.barcode = "";
            this.form.medicineName = "";
            this.form.strength = "";
            this.form.medicineCategory = "";
            this.form.medicineType = "";
            this.form.generic = "";
            this.form.medicineCompanay = "";
            this.form.medicineIndication = "";
            this.form.unit = "";
            this.form.minLevel = "";
            this.form.reOrderLevel = "";
            this.form.tax = "";
            this.form.packing = "";
            this.form.packSize = "";
            this.form.modeOfAction = "";
            this.form.note = "";
            $("#addMedicine").modal("hide");
            toastr.success("Medicine created successfully!");
          }
        })
        .catch((err) => {
          console.error(err);
        });
    },
    editData(id) {
      axios
        .get("/api/medicine/"+id)
        .then((res) => {
          // console.log(editFrom.id);
          this.editFrom = res.data
          // console.log(res.data)
        })
        .catch((err) => {
          console.error(err);
        });
    },
    updateData(){
      // console.log('update');
      console.log(this.editFrom.id);
      axios.put('/api/medicine/'+this.editFrom.id,this.editFrom)
      .then(res => {
        // console.log(res.data)
        this.fatchData()
        this.editFrom = "";
        $("#editMedicine").modal("hide");

      })
      .catch(err => {
        console.error(err); 
      })
    },
    deleteData(id) {
      if (!window.confirm("Are you share to deleted")) {
        return;
      }
      axios
        .delete("/api/medicine/" + id)
        .then((res) => {
          if (res.status === 200) {
            this.fatchData();
            toastr.success("Medicine Deleted successfully!");
          }
        })
        .catch((err) => {
          console.error(err);
        });
    },
  },
};
</script>
<style>
</style>