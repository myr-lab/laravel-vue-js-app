<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Category</div>

<div class="card-body">

   <form action="" @submit.prevent="addNewCategory">
       <legend>Add new category</legend>
       
       <div class="form-group">
           <label for="">Category Name</label>
           <input type="text" 
                  class="form-control" 
                  placeholder="Enter category name" 
                  v-model="form.name"
                  :class="{ 'is-invalid': form.errors.has('name')}">
      <has-error :form="form" field="name"></has-error>
       </div>
   
       <button :disabled="form.busy" type="submit" class="btn btn-primary">Submit</button>
   </form>

   <table class="table table-hover">
       <thead>
           <tr>
               <th>No</th>
               <th>Name</th>
               <th>Created</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           <tr v-for="(item,index) in loadCategory" :key="item.id">

               <td>{{ index + 1 }}</td>
               <td>{{item.name}}</td>
               <td>{{item.created_at | formatDate}}</td>
               <td>
                 <router-link href="#" :to="`editcategory/${item.id}`">
                      <i class="fa fa-edit blue"></i>
                  </router-link> | <a href="" class="fa fa-trash" @click.prevent="deleteCategory(item.id)"></a>
               </td>

           </tr>
       </tbody>
   </table>
</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data(){
        return {
         
          form: new Form({
            name: '',
          })
        }
       },
       methods: {
         
         addNewCategory(){

            this.form.post('api/category')
            .then(()=>{
                Toast.fire({
                  icon: 'success',
                  title: 'Category added successfully'
                })
              this.$store.dispatch("allCategoryFromDatabase")
              this.form.name = ''
            })

            .catch(()=>{
                console.log('Error.....')
            })
         },
    deleteCategory(id) {

         
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                
              if (result.value) {
                //Send Request to server
                this.form.delete('api/category/'+id)
                    .then((response)=> {
                            Swal.fire(
                              'Deleted!',
                              'User deleted successfully',
                              'success'
                            )
                    this.$store.dispatch("allCategoryFromDatabase")

                    }).catch(() => {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!',
                          footer: '<a href>Why do I have this issue?</a>'
                        })
                    })
                }

            })
          }
       

       },
      computed: {
         loadCategory(){
           return this.$store.getters.getCategoryFormGetters
         }
      },
      mounted() {

        this.$store.dispatch("allCategoryFromDatabase")

      },

    }
</script>


