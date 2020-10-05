<template>
  <div class="container">
    <form @submit.prevent="addQuestion">
      <div class="row">
        <label for="topic" class="active">Select Topic</label>
        <select v-model="question.topic_id" class="browser-default" @change="getObj($event)">
          <option value disabled selected>Choose your topic</option>
          <option
            v-for="topic in topics"
            v-bind:value="topic.id"
            v-bind:key="topic.id"
            v-html="topic.topic"
          ></option>
        </select>
      </div>
      <div class="row">
        <label for="objective" class="active">Select Objective</label>
        <select v-model="question.objective_id" class="browser-default">
          <option value disabled selected>Choose your Objective</option>
          <option
            v-for="objective in objectives"
            v-bind:value="objective.id"
            v-bind:key="objective.id"
            v-html="objective.title"
          ></option>
        </select>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="explanation">Explanation</label>
          <i class="material-icons prefix"></i>
          <input id="explanation" type="text" class="validate" v-model="question.explanation" />
        </div>
      </div>
      <div class="row">
        <div class="file-field input-field col s12">
          <div class="btn">
            <span>File Name</span>
            <input type="file" @change="onPathChange($event)" multiple />
          </div>
          <div class="file-path-wrapper">
            <input
              v-model="question.fileName"
              class="file-path validate"
              type="text"
              placeholder="Upload one or more files"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="quesYearNum">Question Year Number</label>
          <i class="material-icons prefix">year</i>
          <input id="quesYearNum" type="text" class="validate" v-model="question.quesYearNum" />
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="quesYear">Question Year</label>
          <i class="material-icons prefix"></i>
          <input id="quesYear" type="text" class="validate" v-model="question.quesYear" />
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="passage">Passage</label>
          <i class="material-icons prefix"></i>
          <input id="passage" type="text" class="validate" v-model="question.passage" />
        </div>
      </div>
      
      <div class="row">
        
          <label for="question">Question</label>
        <div class="input-field col s12">
          <quill-editor ref="myTextEditor" v-model="question.question" :config="editorOption"></quill-editor>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="optionA">option A</label>
          <i class="material-icons prefix"></i>
          <input id="optionA" type="text" class="validate" v-model="question.optionA" />
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="optionB">option B</label>
          <i class="material-icons prefix"></i>
          <input id="optionB" type="text" class="validate" v-model="question.optionB" />
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="optionC">option C</label>
          <i class="material-icons prefix"></i>
          <input id="optionC" type="text" class="validate" v-model="question.optionC" />
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="optionD">option D</label>
          <i class="material-icons prefix"></i>
          <input id="optionD" type="text" class="validate" v-model="question.optionD" />
        </div>
      </div>
      <div class="row">
        <label for="objectivee" class="active">Select Answer</label>
        <select v-model="question.answer" class="browser-default">
          <option value selected>Select the right Answer</option>
          <option class value="A">Option A</option>
          <option class value="B">Option B</option>
          <option class value="C">Option C</option>
          <option class value="D">Option D</option>
        </select>
      </div>
      <div class="row">
        <div class="file-field input-field col s12">
          <div class="btn">
            <span>Upload Image</span>
            <input type="file" multiple v-on:change="onImageChange" />
          </div>
          <div class="file-path-wrapper">
            <input
              v-model="question.quesimg"
              class="file-path validate"
              type="text"
              placeholder="Upload this question image"
            />
          </div>
        </div>
      </div>
      <button type="submit" class="btn blue right">
        <i class="material-icons">add</i>Save
      </button>
    </form>
  </div>
</template>

<script>
import { quillEditor } from "vue-quill-editor";
window.swal = require("sweetalert2");
export default {
  data() {
    return {
      questions: [],
      objectives: [],
      topics: [],
      topic: {
        id: "",
        subj_id: "",
        topic: "",
      },
      objective: {
        id: "",
        // subject_id: "",
        topic_id: "",
        title: "",
      },
      question: {
        id: "",
        topic_id: "",
        objective_id: "",
        topic_id: "",
        explanation: "",
        quesYearNum: "",
        quesYear: "",
        passage: "",
        fileName: "",
        answer: "",
        optionA: "",
        optionB: "",
        optionC: "",
        optionD: "",
        question: "",
        quesimg: "",
      },
      question_id: "",
      edit: false,
    };
  },
  created() {
    this.fetchObjective();
    this.fetchTopic();
  },
  methods: {
    getObj(event) {
      let topicId = event.target.value;
      this.axios.get(`api/objectiveInTopic/${topicId}`).then((res) => {
        this.objectives = res.data;
        // console.log(res);
      });
    },
    fetchObjective() {
      this.axios.get(`api/objective`).then((res) => {
        this.objectives = res.data;
        // console.log(res);
      });
    },
    fetchTopic() {
      this.axios
        .get("api/topic")
        // .then(res => res.json())
        .then((res) => {
          this.topics = res.data;
          // console.log(res.data);
        });
    },
    onImageChange(event) {
      // console.log(event);
      if (!event.target.files.length) return;

      this.question.quesimg = event.target.files[0];
    },
    onPathChange(event) {
      if (!event.target.files.length) return;

      this.question.fileName = event.target.files[0];
    },
    addQuestion() {
      if (this.edit === false) {
        const data = new FormData();
        data.append("explanation", this.question.explanation);
        data.append("question", this.question.question);
        data.append("passage", this.question.passage);
        data.append("fileName", this.question.fileName);
        data.append("answer", this.question.answer);
        data.append("quesimg", this.question.quesimg);
        data.append("optionA", this.question.optionA);
        data.append("optionB", this.question.optionB);
        data.append("optionC", this.question.optionC);
        data.append("optionD", this.question.optionD);
        data.append("quesYear", this.question.quesYear);
        data.append("quesYearNum", this.question.quesYearNum);
        data.append("objective_id", this.question.objective_id);
        data.append("topic_id", this.question.topic_id);
        let url = "api/createQuestion";
        this.axios
          .post(url, data)
          .then((res) => {})
          // .then((res) => res.json())
          .then((data) => {
            this.question.explanation = "";
            this.question.question = "";
            this.question.fileName = "";
            this.question.passage = "";
            this.question.answer = "";
            this.question.quesimg = "";
            this.question.optionA = "";
            this.question.optionB = "";
            this.question.optionC = "";
            this.question.optionD = "";
            this.question.quesYear = "";
            this.question.quesYearNum = "";
            this.question.objective_id = "";
            this.question.topic_id = "";
             Swal.fire("Added!", "Your file has been Added.", "success");
            // this.fetchquestion();
            // console.log(data);
          })
          .catch((err) => console.log(err));
      } else {
        // Update
        const data = new FormData();
        data.append("explanation", this.question.explanation);
        data.append("question", this.question.question);
        data.append("passage", this.question.passage);
        data.append("fileName", this.question.fileName);
        data.append("answer", this.question.answer);
        data.append("quesimg", this.question.quesimg);
        data.append("optionA", this.question.optionA);
        data.append("optionB", this.question.optionB);
        data.append("optionC", this.question.optionC);
        data.append("optionD", this.question.optionD);
        data.append("quesYear", this.question.quesYear);
        data.append("quesYearNum", this.question.quesYearNum);
        data.append("objective_id", this.question.objective_id);
        data.append("topic_id", this.question.topic_id);
        let url = `api/updateQuestion/${this.question.id}`;
        this.axios
          .put(url, data)
          .then((res) => res.json())
          .then((data) => {
            this.question.explanation = "";
            this.question.question = "";
            this.question.fileName = "";
            this.question.passage = "";
            this.question.answer = "";
            this.question.quesimg = "";
            this.question.optionA = "";
            this.question.optionB = "";
            this.question.optionC = "";
            this.question.optionD = "";
            this.question.quesYear = "";
            this.question.quesYearNum = "";
            this.question.objective_id = "";
            this.question.topic_id = "";
             Swal.fire("Updated!", "Your file has been Updated.", "success");
            this.fetchquestion();
            // console.log(data);
          })
          .catch((err) => console.log(err));
      }
    },
  },
};
</script>

<style>
</style>