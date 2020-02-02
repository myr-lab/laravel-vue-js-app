<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-around">
        <div class="col-md-10">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Manage article</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="postId">Add New Post</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.name"
                    placeholder="Add New Post"
                    name="name"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                  />
                  <has-error :form="form" field="name"></has-error>
                </div>

              </div>
              <div class="card-footer">
                <input
                  type="submit"
                  class="btn btn-primary"
                  @click.prevent="UpdateArticle"
                  value="Update"
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
       name: "",
      })
    };
  },
  mounted() {
  
  },
  created() {
    axios.get(`api/category/${this.$route.params.id}`)
    .then(response => {
         console.log(response.data.category);
         this.form.fill(response.data.category);
     });
  },
  computed: {
  
  },
  methods: {

    UpdateArticle() {
      this.form
        .put(`api/category/${this.$route.params.id}`)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "Category updated successfully"
          });
          this.$router.push("/category");
        })
        .catch(() => {
          console.log("Error");
        });
    },

  }
};
</script>