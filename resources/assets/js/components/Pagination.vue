<template>
    <ul class="pagination pagination-sm no-margin pull-right">
        <li><a href="#">&laquo;</a></li>

        <li v-for="n in paginationRange">

            <a href="#">1</a>

        </li>

        <li><a href="#">&raquo;</a></li>
    </ul>
</template>
<style>
</style>
<script>
export default {

     props: {

       currentPage: {
       type: Number,
       required: true

        },

        visiblePages: {

         type: Number,
         default: 5,
         coerce: (val) => parseInt(val)

        },

        totalPages: Number,

        itemsPerPage: Number,

        totalItems: Number,

     },


    data() {
        return {}
    },

    methods: {
        activePage (pageNum) {
          return '';

        },

        lowerBound (num, limit) {

    return num >= limit ? num : limit
  }


    },

    computed: {

        lastPage () {
          if (this.totalPages) {
            return this.totalPages
          } else {
            return this.totalItems % this.itemsPerPage === 0
              ? this.totalItems / this.itemsPerPage
              : Math.floor(this.totalItems / this.itemsPerPage) + 1
          }
        },

    paginationRange () {

      let start = this.currentPage - this.visiblePages / 2 <= 0
                    ? 1 : this.currentPage + this.visiblePages / 2 > this.lastPage
                    ? this.lowerBound(this.lastPage - this.visiblePages + 1, 1)
                    : Math.ceil(this.currentPage - this.visiblePages / 2)
      let range = []
      for (let i = 0; i < this.visiblePages && i < this.lastPage; i++) {
        range.push(start + i)
      }
      return range
    },
  },





}
</script>