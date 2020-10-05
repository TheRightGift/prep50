<template>
  <div class="container">
    <form @submit.prevent="addObjective">
      <div class="row">
        <label for="subject" class="active">Select Subject</label>
        <select v-model="objective.subject_id" @change="getSubj($event)" class="browser-default">
          <option  value disabled selected>Choose your Subject</option>
          <option
            v-for="subject in subjects"
            v-bind:value="subject.id"
            v-bind:key="subject.id" v-html="subject.subj"
          ></option>
        </select>
      </div>
      <div class="row">
        <label for="topic" class="active">Select Topic</label>
        <select v-model="objective.topic_id" class="browser-default">
          <option value disabled selected>Choose your topic</option>
          <option
            v-for="topic in topics"
            v-bind:value="topic.id"
            v-bind:key="topic.id" v-html="topic.topic"
          ></option>
        </select>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <i class="material-icons prefix">account_circle</i>
          <input id="objective" type="text" class="validate" v-model="objective.title" />
          <label for="objectve">Objective</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix">account_circle</i>
          <input id="creditLoad" type="text" class="validate" v-model="objective.creditLoad" />
          <label for="creditLoad">Credit Load</label>
        </div>
      </div>
      <button type="submit" class="btn blue right">
        <i class="material-icons">add</i>Save
      </button>
    </form>
    <div class="row">
      <h1>All Objective</h1>
      <table>
      <thead>
        <tr>
          <th data-field="id">Objective ID</th>
          <th data-field="name">Objective Name</th>
          <th data-field="action">Action</th>
        </tr>
      </thead>
      <tbody  v-for="objective in objectives" v-bind:key="objective.id">
        <tr>
          <td>{{objective.id}}</td>
          <td v-html="objective.title"></td>
          <td colspan="2"><button @click="editObjective(objective)" class="btn"><i class="material-icons">edit</i></button></td>
          <td colspan="2"><button @click="deleteObjective(objective.id)" class="btn red"><i class="material-icons">delete</i></button></td>
        </tr>
      </tbody>
    </table>  
    </div>
  </div>
</template>

<script>
window.swal = require('sweetalert2')
export default {
  data() {
    return {
      subjects: [],
      topics: [],
      objectives: [],
      subject: {
        id: "",
        subj: "",
      },
      topic: {
        id: "",
        topic: "",
      },
      objective: {
        id: "",
        subject_id: "",
        topic_id: "",
        creditLoad: "",
        title: "",
      },
      objective_id: "",
      edit: false,
      topic: null,
    };
  },
  created() {
    this.axios.get("api/subject").then((res) => {
      this.subjects = res.data;
      // console.log(res);
    });
    this.fetchObjective();
    // this.fetchTopic();
  },
  methods: {
    getSubj(event) {
      let subjectId = event.target.value;
      this.axios.get(`api/TopicsInSubjects/${subjectId}`).then((res) => {
        this.topics = res.data;
        // console.log(res);
      });
    },
    fetchObjective() {
      this.axios.get("api/objective").then((res) => {
        this.objectives = res.data;
        // console.log(res);
      });
    },
    addObjective() {
      console.log(this.objective);
      if (this.edit === false) {
        //ADD
        fetch(`api/createObjective`, {
          method: "post",
          body: JSON.stringify(this.objective),
          headers: {
            "content-type": "application/json",
          },
        })
          .then((res) => res.json())
          .then((data) => {
            this.objective.subject_id = "";
            this.objective.creditLoad = "";
            this.objective.topic_id = "";
            this.objective.tittle = "";
            Swal.fire("Added!", "Your Objective has been Added.", "success");
            this.fetchObjective();
            // console.log(res.data);
          })
          .catch((err) => console.log(err));
      } else {
        // Update

        fetch(`api/createObjective`, {
          method: "put",
          body: JSON.stringify(this.objective),
          headers: {
            "content-type": "application/json",
          },
        })
          .then((res) => res.json())
          .then((data) => {
            this.objective.subj_id = "";
            this.objective.creditLoad = "";
            this.objective.topic_id = "";
            this.objective.tittle = "";
            Swal.fire("Updated!", "Your Objective has been Updated.", "success");
            this.fetchObjective();
            // console.log(data);
          })
          .catch((err) => console.log(err));
      }
    },
    deleteObjective(id) {
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
          fetch(`api/delObjective/${id}`, {
            method: "delete",
          });
          // .then(res => res.json())
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
          this.fetchObjective();
        }
      });
    },
    editObjective(objective) {
      this.edit = true;
      this.objective.id = objective.id;
      this.objective.objective_id = objective.id;
      this.objective.subj_id = objective.subj_id;
      this.objective.topic_id = objective.topic_id;
      this.objective.objective = objective.title;
    },
  },
};
</script>

<style>
</style>