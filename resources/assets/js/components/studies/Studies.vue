<template>
    <div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add study</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" placeholder="Enter study name here"
                               v-model="newStudy"
                               @keyup.enter="addStudy">
                    </div>
                </div>
            </form>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Studies</h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-default">{{visibility}}</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"  @click="setVisibility('all')">All</a></li>
                        <li><a href="#"  @click="setVisibility('active')">Active</a></li>
                        <li><a href="#/" @click="setVisibility('completed')">Completed</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <study v-for="(study, index) in filteredStudies"
                          v-bind:study="study"
                          v-bind:index="index"
                          v-bind:from="from"
                          v-bind:page="page"
                          v-bind:fetchPage="fetchPage"
                          @study-deleted="deleteStudy">
                    </study>
                    </tbody>

                </table>
            </div>

            <div class="box-footer clearfix">
                <span class="pull-left">Showing {{ from }} to {{ to }} of {{ total }} entries</span>

                <pagination
                        :current-page="page"
                        :items-per-page="perPage"
                        :total-items="total"
                        @page-changed="pageChanged">
                </pagination>
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from './../Pagination.vue'
import Study from './Study.vue'

export default {
  components: {
    Pagination, Study
  },
  data() {
    return {
      studies: [],
      visibility: 'all',
      newStudy: '',
      from: 0,
      to: 0,
      total: 0,
      perPage: 0,
      page: 1
    }
  },
  computed: {
    filteredStudies: function () {
      var filters = {
        all: function (studies) {
          return studies
        },
        active: function (studies) {
          return studies.filter(function (study) {
            return !study.state
          })
        },
        completed: function (studies) {
          return studies.filter(function (study) {
            return study.state
          })
        }
      }
      return filters[this.visibility](this.studies)
    }
  },
  created() {
    console.log('Component studies created.')
    this.fetchData()
  },
  methods: {
    getStudyId: function (index) {
      axios.get('/api/v1/studies').then((response) => {
        var studies = this.studies = response.data.data
        this.id = studies[index].id
      }, (response) => {
        sweetAlert("Oops...","Something went wrong!", "error")
        console.log(response)
      })
    },
    pageChanged: function (pageNum) {
      this.page = pageNum
      this.fetchPage(pageNum)
    },
    addStudy: function () {
      var value = this.newStudy && this.newStudy.trim()
      if (!value) {
        return
      }

      var study = {
        name: value,
        state: false,
        user_id: 1
      }

      this.studies.push(study)
      this.newStudy = ''
      this.addStudyToApi(study)
    },
    setVisibility: function (visibility) {
      this.visibility = visibility
    },
    fetchData: function () {
      return this.fetchPage(1)
    },
    addStudyToApi: function (study) {
      axios.post('/api/v1/studies', {
        name: study.name,
        state: study.state,
        user_id: study.user_id,
      }).then((response) => {
        console.log('Study with name \"' + study.name + '\" created succesfully!')
      }, (response) => {
        sweetAlert("Oops...","Something went wrong!", "error")
        console.log(response)
      })
      this.fetchPage(this.page)
    },
    fetchPage: function (page) {
      axios.get('/api/v1/studies?page=' +  page).then((response) => {
        console.log(response)
        this.studies = response.data.data
        this.perPage = response.data.per_page
        this.to = response.data.to
        this.from = response.data.from
        this.total = response.data.total
      }, (response) => {
        sweetAlert("Oops...", "Something went wrong!", "error")
        console.log(response)
      })
    },
    deleteStudy: function(id) {
      var del = this
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this task!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      },
      function () {
        del.deleteStudyFromApi(id)
        swal("Deleted!", "Your task has been deleted.", "success")
      })
    },
    deleteStudyFromApi: function(id) {
      axios.delete('/api/v1/studies/' + id).then((response) => {
        console.log('Study ' + id + ' deleted succesfully!')
      }, (response) => {
        sweetAlert("Oops...", "Something went wrong!", "error")
        console.log(response)
      })
        this.fetchPage(this.page)
    }
  }
}
</script>