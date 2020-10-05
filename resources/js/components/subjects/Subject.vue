<template>
  <div class="container">
    <form @submit.prevent="addSubject" class>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input
            id="icon_prefix"
            type="text"
            placeholder="Subject"
            class="validate"
            v-model="subject.subj"
          />
          <label for="icon_prefix">Subject</label>
        </div>
      </div>
      <button type="submit" class="btn blue right">
        <i class="material-icons">add</i>Save
      </button>
    </form>
    <br />
    <div class="row">
        <h1>All Subjects</h1>
        <table>
      <thead>
        <tr>
          <th data-field="id">Subject ID</th>
          <th data-field="name">Subject Name</th>
          <th data-field="action">Action</th>
        </tr>
      </thead>
      <tbody  v-for="subject in subjects" v-bind:key="subject.id">
        <tr>
          <td>{{subject.id}}</td>
          <td v-html="subject.subj"></td>
          <td colspan="2"><button @click="editSubject(subject)" class="btn"><i class="material-icons">edit</i>Edit</button></td>
          <td colspan="2"><button @click="deleteSubject(subject.id)" class="btn red"><i class="material-icons">delete</i>Delete</button></td>
        </tr>
      </tbody>
    </table>  
    </div>
  </div>
</template>

<script>
const Swal = require("sweetalert2");

export default {
  data() {
    return {
      subjects: [],
      subject: {
        id: "",
        subj: "",
      },
      subject_id: "",
      edit: false,
    };
  },

  created() {
    this.fetchSubjects();
  },
  methods: {
    fetchSubjects() {
      this.axios
        .get("api/subject")
        // .then(res => res.json())
        .then((res) => {
          this.subjects = res.data;
          // console.log(res.data);
        });
    },
    deleteSubject(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          fetch(`api/subject/${id}`, {
            method: "delete",
          });
          // .then(res => res.json())
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
          this.fetchSubjects();
        }
      });
    },
    addSubject() {
      if (this.edit === false) {
        //ADD
        fetch(`api/createSubject`, {
          method: "post",
          body: JSON.stringify(this.subject),
          headers: {
            "content-type": "application/json",
          },
        })
          .then((res) => res.json())
          .then((data) => {
            this.subject.subj = "";
            // alert('Subject Added');
            Swal.fire("Added!", "Subject has been added and updated.", "success");
            this.fetchSubjects();
            // console.log(res.data);
            
          }).catch((err) => console.log(err));
          
      } else {
        // Update

        fetch(`api/updateSubject/${this.subject.id}`, {
          method: "put",
          body: JSON.stringify(this.subject),
          headers: {
            "content-type": "application/json",
          },
        })
          .then((res) => res.json())
          .then((data) => {
            this.subject.subj = "";
            Swal.fire("Updated!", "Subject has been added and updated.", "success");
            this.fetchSubjects();
            // console.log(res.data);
          })
          .catch((err) => console.log(err));
      }
    },
    editSubject(subject) {
      this.edit = true;
      this.subject.id = subject.id;
      this.subject.subject_id = subject.id;
      this.subject.subj = subject.subj;
    },
  },
};
</script>