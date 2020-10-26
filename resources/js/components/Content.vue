<template>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 left-side">
      <h4 class="mt-3">Students</h4>
    </div>
    <div class="col-md-10">
      <div class="content mt-2 ml-2">
    <button class="btn btn-info" @click="viewCreateStudentInfo()">
      <i class="fa fa-plus" aria-hidden="true"></i> New
    </button>
<div class="data-contex">
    <table class="table mt-2">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NameFull</th>
          <th scope="col">Identity</th>
          <th scope="col">Uni ID</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="std_item in fileteredList" :key="std_item.id">
          <th scope="row">{{ std_item.id }}</th>
          <td>{{ std_item.NameFull }}</td>
          <td>{{ std_item.Identity }}</td>
          <td>{{ std_item.uni_id }}</td>
          <td>
            <button
              @click="viewStudentInfo(std_item)"
              class="btn btn-info btn-sm mr-1"
            >
              <i class="fa fa-eye" aria-hidden="true"></i></button
            ><button
              @click="viewUpdateStudentInfo(std_item)"
              class="btn btn-warning btn-sm mr-1"
            >
              <i class="fa fa-pencil" aria-hidden="true"></i></button
            ><button
              @click="delete_student(std_item)"
              class="btn btn-danger btn-sm"
            >
              <i class="fa fa-times" aria-hidden="true"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
</div>
<p><b>Number Of Students:</b> {{studentCount}}</p>
    <!-- vue modal goes start -->
    <!-- Modal -->
    <div v-if="showModal">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">
                    Student ID: {{ selectedStudent.id }}
                  </h5>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true" @click="showModal = false"
                      >&times;</span
                    >
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table">
                    <tr>
                      <th>FullName</th>
                      <td>{{ selectedStudent.NameFull }}</td>
                    </tr>
                    <tr>
                      <th>Identity</th>
                      <td>{{ selectedStudent.Identity }}</td>
                    </tr>
                    <tr>
                      <th>Nationality</th>
                      <td>{{ selectedStudent.Nationality }}</td>
                    </tr>
                    <tr>
                      <th>Birthday</th>
                      <td>{{ selectedStudent.Nationality }}</td>
                    </tr>
                    <tr>
                      <th>NameWithInitial</th>
                      <td>{{ selectedStudent.NameWithInitials }}</td>
                    </tr>
                    <tr>
                      <th>Address</th>
                      <td>{{ selectedStudent.Address }}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{ selectedStudent.email }}</td>
                    </tr>
                    <tr>
                      <th>Country</th>
                      <td>{{ selectedStudent.country }}</td>
                    </tr>
                    <tr>
                      <th>Active</th>
                      <td>{{ selectedStudent.Active }}</td>
                    </tr>
                    <tr>
                      <th>Registered</th>
                      <td>{{ selectedStudent.Registered }}</td>
                    </tr>
                  </table>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    @click="showModal = false"
                  >
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
    <!-- vue modal end -->

    <!-- Update -->
    <div v-if="showUpdateModal">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div
              class="modal-dialog modal-lg modal-dialog-scrollable"
              role="document"
            >
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">
                    Student ID: {{ selectedStudent.id }}
                  </h5>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true" @click="showUpdateModal = false"
                      >&times;</span
                    >
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form">
                    <!-- <input type="hidden" name=""> -->
                    <div class="form-group">
                      <label for="fullname">FullName</label>
                      <input
                        type="text"
                        class="form-control"
                        id="fullname"
                        v-model="updateData.NameFull"
                        placeholder="Full Name"
                      />
                    </div>
                    <div class="form-group">
                      <label for="uni_id">Uni_ID</label>
                      <input
                        type="text"
                        class="form-control"
                        id="uni_id"
                        v-model="updateData.uni_id"
                        placeholder="Uni_id"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Identity</label>
                      <input
                        type="text"
                        class="form-control"
                        id="uni_id"
                        v-model="updateData.Identity"
                        placeholder="Identity"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Nationality</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nationality"
                        v-model="updateData.Nationality"
                        placeholder="Nationality"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Birthday</label>
                      <input
                        type="date"
                        class="form-control"
                        id="nationality"
                        v-model="updateData.Birthday"
                        placeholder="Birthday"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">NameWithInitials</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nationality"
                        v-model="updateData.NameWithInitials"
                        placeholder="NameWithInitials"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Address</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nationality"
                        v-model="updateData.Address"
                        placeholder="Address"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="nationality"
                        v-model="updateData.email"
                        placeholder="Email"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Country</label>
                      <input
                        type="text"
                        class="form-control"
                        id="country"
                        v-model="updateData.country"
                        placeholder="Country"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Phone No</label>
                      <input
                        type="text"
                        class="form-control"
                        id="PhoneNo"
                        v-model="updateData.phoneNo"
                        placeholder="phoneNo"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Active</label>
                      <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          v-model="updateData.Active"
                          value="yes"
                          id="customRadioInline1"
                          class="custom-control-input"
                        />
                        <label
                          class="custom-control-label"
                          for="customRadioInline1"
                          >Yes</label
                        >
                      </div>
                      <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          v-model="updateData.Active"
                          value="no"
                          id="customRadioInline2"
                          class="custom-control-input"
                        />
                        <label
                          class="custom-control-label"
                          for="customRadioInline2"
                          >No</label
                        >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fullname">Registered</label>
                      <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          v-model="updateData.Registered"
                          value="yes"
                          name="customRadioInline1"
                          class="custom-control-input"
                        />
                        <label
                          class="custom-control-label"
                          for="customRadioInline1"
                          >Yes</label
                        >
                      </div>
                      <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          v-model="updateData.Registered"
                          value="no"
                          id="customRadioInline2"
                          name="customRadioInline1"
                          class="custom-control-input"
                        />
                        <label
                          class="custom-control-label"
                          for="customRadioInline2"
                          >No</label
                        >
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    @click="showUpdateModal = false"
                  >
                    Close
                  </button>
                  <button type="button" @click="updateStudent()" class="btn btn-primary">
                    Update
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
    <!-- vue modal end -->
    <!-- Create -->
    <div v-if="showCreateModal">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div
              class="modal-dialog modal-lg modal-dialog-scrollable"
              role="document"
            >
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Create New Student</h5>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true" @click="showCreateModal = false"
                      >&times;</span
                    >
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form" action="">
                    <div class="form-group">
                      <label for="fullname">FullName</label>
                      <input
                        type="text"
                        class="form-control"
                        id="fullname"
                        v-model="createData.NameFull"
                        placeholder="Full Name"
                      />
                    </div>
                    <div class="form-group">
                      <label for="uni_id">Uni_ID</label>
                      <input
                        type="text"
                        class="form-control"
                        id="uni_id"
                        v-model="createData.uni_id"
                        placeholder="Uni_id"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Identity</label>
                      <input
                        type="text"
                        class="form-control"
                        id="uni_id"
                        v-model="createData.Identity"
                        placeholder="Identity"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Nationality</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nationality"
                        v-model="createData.Nationality"
                        placeholder="Nationality"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Birthday</label>
                      <input
                        type="date"
                        class="form-control"
                        id="nationality"
                        v-model="createData.Birthday"
                        placeholder="Birthday"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">NameWithInitials</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nationality"
                        v-model="createData.NameWithInitials"
                        placeholder="NameWithInitials"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Address</label>
                      <input
                        type="text"
                        class="form-control"
                        id="nationality"
                        v-model="createData.Address"
                        placeholder="Address"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="nationality"
                        v-model="createData.email"
                        placeholder="Email"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Country</label>
                      <input
                        type="text"
                        class="form-control"
                        id="country"
                        v-model="createData.country"
                        placeholder="Country"
                      />
                    </div>
                    <div class="form-group">
                      <label for="fullname">Phone No</label>
                      <input
                        type="text"
                        class="form-control"
                        id="PhoneNo"
                        v-model="createData.phoneNo"
                        placeholder="phoneNo"
                      />
                    </div>
                    <div class="form-group">
    <label for="exampleFormControlSelect1">Active</label>
    <select v-model="createData.Active" class="form-control" id="exampleFormControlSelect1">
      <option value="no" selected>No</option>
      <option value="yes">Yes</option>
    </select>
  </div>
                    <div class="form-group">
    <label for="exampleFormControlSelect1">Registered</label>
    <select v-model="createData.Registered" class="form-control" id="exampleFormControlSelect1">
      <option value="no" selected>No</option>
      <option value="yes">Yes</option>
    </select>
  </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    @click="showCreateModal = false"
                  >
                    Close
                  </button>
                  <button type="button" @click="createStudent()" class="btn btn-primary">
                    Save changes
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
    <!-- vue modal end -->
   
  </div>
</div>
  </div>
</div>
  
</template>

<script>
import axios from "axios";
import swal from "sweetalert";
export default {
  data() {
    return {
      students: [],
      showModal: false,
      selectedStudent: {},
      updateData: {},
      createData: {Active:"no", Registered:"no"},
      showUpdateModal: false,
      showCreateModal: false,
      studentCount:0
    };
  },
  props:['keyword'],
  methods: {
    fetchStudents: function () {
      axios
        .get("http://127.0.0.1:8000/api/get_all_students")
        .then((response) => {
          console.log(response);
          this.students = response.data;
          this.studentCount=this.students.length
        });
    },
    delete_student: function (student_record) {
      swal({
        title: "Are you sure?",
        text:
          "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
           axios
        .delete("http://127.0.0.1:8000/api/delete_student/"+student_record.id)
        .then((response) => {
          
          this.fetchStudents()
          swal("Poof! This student has been deleted!", {
            icon: "success",
          });
        });
          
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    },
    createStudent:function(){
      console.log(this.createData);
      axios.post("http://127.0.0.1:8000/api/create_new_student",this.createData)
      .then(response=>{
        console.log(response)
        this.fetchStudents()
      }).catch(err=>console.log(err))
      this.createData={Active:"no", Registered:"no"}//reset form
    },
    updateStudent:function(){
      // console.log(this.updateStudent);
      axios.put("http://127.0.0.1:8000/api/update_student",this.updateData)
      .then(response=>{
        console.log(response)
        this.fetchStudents()
      }).catch(err=>console.log(err))
      this.createData={Active:"no", Registered:"no"}//reset form
    },
    viewStudentInfo: function (student_record) {
      // console.log(student_record);
      this.selectedStudent = student_record;
      this.showModal = true;
    },
    viewUpdateStudentInfo: function (student_record) {
      // console.log(student_record);
      this.updateData = student_record;
      this.showUpdateModal = true;
    },
    viewCreateStudentInfo: function () {
      // console.log(student_record);
      this.showCreateModal = true;
    },

  },
  computed: {
    fileteredList:function(){
      var c= this.students.filter((item)=>{
        return this.keyword.toLowerCase().split(' ').every(v => item.NameFull.toLowerCase().includes(v))
      })
       this.studentCount=c.length
       return c;
    }
  },
  mounted() {
    console.log("Example component mounted");
    this.fetchStudents();
    
  },
};
</script>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.left-side{
  background: #333;
  color:whitesmoke;

}
.data-contex{
  height:72vh;
  overflow: auto;
}
</style>