<template>
    <tr>
        <td>{{index + from }}</td>
        <td>
            <div v-if="!editingName" @dblclick="editStudyName(page,study.id)">
                <span>{{study.name}}</span>
                <button style="float: right;" type="button" class="btn btn-warning btn-flat btn-xs" @click="editStudyName(page,study.id)">
                    <i class="fa fa-fw fa-edit"></i>
                </button>
            </div>
            <div v-else @keyup.esc="uneditStudy(page)" @keyup.enter="editStudyName(page,study.id)">
                <input v-model="study.name" size="100">
                <div  style="float: right;">
                    <button type="button" class="btn btn-success btn-flat btn-xs" @click="editStudyName(page,study.id)">
                        <i class="fa fa-fw fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-flat btn-xs" @click="uneditStudy(page)">
                        <i class="fa fa-fw fa-close"></i>
                    </button>
                </div>
            </div>
        </td>
        <td align="center">
            <div v-if="study.state">
                <input type="checkbox" class="checkbox icheck" checked @click="editStudyState(page,study.state)">
            </div>

            <div v-else>
                <input type="checkbox" class="checkbox icheck" @click="editStudyState(page,study.state)">
            </div>
        </td>
        <td align="center">
            <div class="btn-group">
                <button type="button" class="btn btn-info btn-flat" @click="editStudyName(page,study.id)">
                    <i class="fa fa-edit"></i>
                </button>

                <button type="button" class="btn btn-danger btn-flat" @click="deleteStudy(study.id)">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
  props: ['study','index','from','page','fetchPage'],

  data() {
    return {
      editingName: false,
      editingState: false
    }
  },

  created () {
    console.log('Component study created.')
  },

  methods: {
    editStudyName: function(pageNum) {
      if (this.editingName == true) {
        this.editStudyNameToAPI()
        this.editingName = false

        return this.fetchPage(pageNum)
      }
      this.editingName = true
      return this.fetchPage(pageNum)
    },
    editStudyNameToAPI: function() {
      axios.put('api/v1/studies' + this.study.id, {
        name: this.study.name,
      }).then((response) => {
        console.log('Name of study ' + this.study.id + ' updated succesfully! Now is known ad \"' + this.study.name + '\".')
      }, (response) => {
        sweetAlert("Oops...","Something went wrong!", "error")
        console.log(response)
      })
    },
    editStudyState: function(pageNum, doneStatus) {
      doneStatus = this.study.state = !this.study.state
      this.editStudyStateToApi(doneStatus)
      return this.fetchPage(pageNum)
    },
    editStudyStateToApi: function (doneStatus) {
      axios.put('/api/v1/studies/' + this.study.id, {
        state: doneStatus,
      }).then((response) => {
        console.log('State of study ' + this.study.id + ' updated succesfully! Now has \"' + doneStatus + '\".')
      }, (response) => {
        sweetAlert("Oops...","Something went wrong!", "error")
        console.log('response')
      })
    },
    uneditStudy: function(pageNum) {
      this.editingName = false
      this.editingState = false
      return this.fetchPage(pageNum)
    },
    deleteStudy: function(id) {
      console.log('TODO deleting')
      this.$emit('study-deleted',id)
    },
  }
}
</script>