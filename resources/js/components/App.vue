<template>
  <div>
    <nav class="navbar navbar-dark bg-primary">
      <a class="navbar-brand">Logo</a>
      <form class="form-inline">
        <input
          class="form-control mr-sm-2"
          type="search"
          v-model="search"
          placeholder="Search"
          aria-label="Search"
        />
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          Search
        </button> -->
      </form>
    </nav>
  <content_student :keyword="search"></content_student>
  </div>
</template>
<script>
import content_student from '../components/Content.vue'
export default {
  data() {
    return {
      search:''
    }
  },
  components:{
    content_student
  }
}
</script>