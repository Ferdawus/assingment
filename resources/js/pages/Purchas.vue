<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex">
                <h4>Medicine Purchase List</h4>
                <button
                  type="button"
                  class="btn btn-info btn-info ms-auto"
                  data-bs-toggle="modal"
                  data-bs-target="#add_modal"
                >
                  Purchase Medicine
                </button>

                <!-- </button> -->
                <!-- <router-link to="/purchases" class="btn btn-sm btn-info ms-3 offset-8"
                  >Purchase</router-link
                > -->
              </div>
            </div>
            <div class="card-body">
              <table
                class="table table-bordered border-info table-responsive-lg"
              >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- add -->
      <form action="">
        <div
          class="modal fade"
          id="add_modal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <div class="col-5">
                  <select
                    class="form-select"
                    aria-label="Default select example"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Medicine Category
                        <span class="text-danger">*</span></label
                      >
                      <select
                        class="form-select form-select-sm"
                        aria-label="Default select example"
                      >
                        <option selected>select</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Medicine Name <span class="text-danger">*</span></label
                      >
                      <select
                        class="form-select form-select-sm"
                        aria-label="Default select example"
                      >
                        <option selected>select</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Batch No <span class="text-danger">*</span></label
                      >
                      <input
                        type="number"
                        class="form-control form-control-sm"
                      />
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Expiry Date <span class="text-danger">*</span></label
                      >
                      <input type="date" class="form-control form-control-sm" />
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        MRP ($)<span class="text-danger">*</span></label
                      >
                      <input type="text" class="form-control form-control-sm" />
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Batch Amount ($)</label
                      >
                      <input type="text" class="form-control form-control-sm" />
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Sale Price ($) <span class="text-danger">*</span></label
                      >
                      <input
                        type="number"
                        class="form-control form-control-sm"
                      />
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Packing Qty</label
                      >
                      <input
                        type="number"
                        class="form-control form-control-sm"
                      />
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Quantity <span class="text-danger">*</span>
                      </label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                      />
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Purchase Price ($) <span class="text-danger">*</span>
                      </label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                      />
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Tax <span class="text-danger">*</span>
                      </label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                      />
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">
                        Amount ($) <span class="text-danger">*</span>
                      </label>
                      <input
                        type="number"
                        class="form-control form-control-sm"
                      />
                    </div>
                  </div>
                  <div class="col-2 mrc">
                    <span
                      ><button class="btn btn-info btn-sm mx-2">
                        Add
                      </button></span
                    >
                  </div>
                </div>
                <hr class="bg-gray" />

                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="" class="form-label">Note</label>
                      <textarea class="form-control" id="" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label"
                        >Default file input example</label
                      >
                      <input class="form-control" type="file" id="formFile" />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-6">
                        <div class="row mb-3">
                          <label for="" class="col-sm-4 col-form-label"
                            >Total($)</label
                          >
                          <div class="col-sm-8">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              id=""
                            />
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row mb-3">
                          <label for="" class="col-sm-5 col-form-label"
                            >Discount ($)</label
                          >
                          <div class="col-sm-7">
                            <input
                              type="number"
                              class="form-control form-control-sm"
                              id=""
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <div class="row mb-3">
                          <label for="" class="col-sm-4 col-form-label"
                            >Tax ($)
                          </label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control  form-control-sm" id="" />
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row mb-3">
                          <label for="" class="col-sm-5 col-form-label"
                            >Net Amount ($)</label
                          >
                          <div class="col-sm-7">
                            <input type="number" class="form-control form-control-sm" id="" />
                          </div>
                        </div>
                      </div>
                    </div>
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
                <button type="button" class="btn btn-primary">
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style scope="this api replaced by slot-scope in 2.5.0+">
/* .modal-dialog {
  max-width: 1365px !important;
  margin: 0 !important;
}
.modal-dialog {
  position: relative !important;
  width: auto !important;
  margin: 0 !important;
}
.modal-dialog {
  position: relative !important;
  width: auto !important;
  margin: 0 !important;
  pointer-events: none !important;
}
.mrc {
  margin-top: 32px;
} */
</style>