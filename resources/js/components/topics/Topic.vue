<template>
  <div class="container">
    <form @submit.prevent="addTopic">
      <div class="row">
        <label for="subject" class="active">Select Subject</label>
        <select v-model="topic.subj_id" class="browser-default">
          <option value disabled selected>Choose your Subject</option>
          <option
            v-for="subject in subjects"
            v-bind:value="subject.id"
            v-bind:key="subject.id"
          >{{ subject.subj }}</option>
        </select>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="topic" class="active">Enter Topic</label>
          <!-- <i class="material-icons prefix">account_circle</i> -->
          <input id="topic" type="text" v-model="topic.topic" />
        </div>
      </div>
      <button type="submit" class="btn blue right">
        <i class="material-icons">add</i>Save
      </button>
    </form>
    <!-- Create the editor container -->
    <!-- <div id="editor">
  <p>Hello World!</p>
    </div>-->
    <div class="row">
      <h1>All Topic</h1>
       <!-- <ul class="pagination">
          <li v-bind:class="[{disabled: !pagination.prev_page_url }]"><a href="#!" @click="fetchTopic(pagination.prev_page_url)"><i class="material-icons">chevron_left</i></a></li>
          <li class="active"><a href="#!">1</a></li>
          <li class="waves-effect disabled"><a href="#!">Page{{pagination.current_page}} of {{pagination.last_page}}</a></li>
          <li v-bind:class="[{disabled: !pagination.next_page_url }]"><a href="#!" @click="fetchTopic(pagination.next_page_url)"><i class="material-icons">chevron_right</i></a></li>
        </ul> -->
     <table>
      <thead>
        <tr>
          <th data-field="id">Topic ID</th>
          <th data-field="name">Topic Name</th>
          <th data-field="action">Action</th>
        </tr>
      </thead>
      <tbody v-for="topic in topics" v-bind:key="topic.id">
        <tr>
          <td>{{topic.id}}</td>
          <td v-html="topic.topic"></td>
          <td colspan="2"><button @click="editTopic(topic)" class="btn"><i class="material-icons">edit</i></button></td>
          <td colspan="2"><button @click="deleteTopic(topic.id)" class="btn red"> <i class="material-icons">delete</i></button></td>
        </tr>
      </tbody>
    </table>
    </div>
       
  </div>
</template>
<script>
window.swal = require("sweetalert2");
export default {
  data() {
    return {
      subjects: [],
      topics: [],
      subject: {
        id: "",
        subj: "",
      },
      topic: {
        id: "",
        subj_id: "",
        // topic:"",
      },
      topic_id: "",
      // pagination:{},
      edit: false,
    };
  },
  created() {
    this.axios.get("api/subject").then((res) => {
      this.subjects = res.data;
      // console.log(res);
    });
    this.fetchTopic();
  },
  methods: {
    // fetchTopic(page_url) {
    //   let vm =this;
    //   page_url = page_url || 'api/topic'
    //   this.axios
    //     .get(page_url)
    //     // .then(res => res.json())
    //     .then((res) => {
        
    //       this.topics = res.data;
    //       // console.log(res.data);
    //       vm.makePagination(res.meta, res.links);
    //     })
    //     .catch((err) => console.log(err));
    
    // },
    fetchTopic() {
      this.axios
        .get('api/topic')
        // .then(res => res.json())
        .then((res) => {
        
          this.topics = res.data;
          // console.log(res.data);
        })
    },
    // makePagination(meta, links){
    //     let pagination = {
    //       current_page: meta.current_page,
    //       last_page: meta.last_page,
    //       next_page_url:links.next,
    //       prev_page_url:links.prev,
    //     }
    //     this.pagination = pagination;
    // },
    addTopic() {
      if (this.edit === false) {
        //ADD
        fetch(`api/createTopic`, {
          method: "post",
          body: JSON.stringify(this.topic),
          headers: {
            "content-type": "application/json",
          },
        })
          .then((res) => res.json())
          .then((data) => {
            this.topic.subj_id = "";
            this.topic.topic = "";
            Swal.fire("Added!", "Your file has been added.", "success");
            this.fetchTopic();
            // console.log(data);
          })
          .catch((err) => console.log(err));
      } else {
        // Update
        fetch(`api/updatetopic/${this.topic.id}`, {
          method: "put",
          body: JSON.stringify(this.topic),
          headers: {
            "content-type": "application/json",
          },
        })
          .then((res) => res.json())
          .then((data) => {
            this.topic.subj_id = "";
            this.topic.topic = "";
            Swal.fire("Updated!", "Your Topic has been Updated.", "success");
            this.fetchTopic();
            // console.log(data);
          })
          .catch((err) => console.log(err));
      }
    },
    deleteTopic(id) {
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
          fetch(`api/delTopic/${id}`, {
            method: "delete",
          });
          // .then(res => res.json())
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
          this.fetchTopic();
        }
      });
    },
    editTopic(topic) {
      this.edit = true;
      this.topic.id = topic.id;
      this.topic.topic_id = topic.id;
      this.topic.subj_id = topic.subj_id;
      this.topic.topic = topic.topic;
    },
  },
};
</script>