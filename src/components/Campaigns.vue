<script setup>
import { ref, onMounted } from 'vue'
const campaigns = ref([])
const total = ref(0)
const limit = ref(10)
const offset = ref(0)
async function load(){
  const params = new URLSearchParams({ limit: String(limit.value), offset: String(offset.value) })
  const res = await fetch('/index.php/apps/clubsuite-newsletter/api/campaigns?' + params.toString())
  const data = await res.json()
  campaigns.value = data.rows
  total.value = data.total
}
function next(){ if (offset.value + limit.value < total.value) { offset.value += limit.value; load(); } }
function prev(){ if (offset.value >= limit.value) { offset.value -= limit.value; load(); } }
onMounted(load)
</script>

<template>
  <div>
    <div>
      <button @click="prev">Prev</button>
      <button @click="next">Next</button>
      <span>Showing {{ campaigns.length }} of {{ total }}</span>
    </div>
    <ul>
      <li v-for="c in campaigns" :key="c.id">{{ c.title }} — {{ c.created_at }}</li>
    </ul>
  </div>
</template>
