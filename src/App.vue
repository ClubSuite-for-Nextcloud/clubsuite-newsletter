<template>
  <div id="content" class="app-content">
      <div class="app-navigation">
          <ul>
              <li><a href="#">Kampagnen</a></li>
          </ul>
      </div>
      <div id="app-content">
          <h1>Newsletter Kampagnen</h1>
          <button class="primary" @click="create">Neue Kampagne erstellen</button>
          <ul class="campaign-list">
              <li v-for="c in campaigns" :key="c.id" class="campaign-item">
                  <strong>{{ c.subject }}</strong>
                  <span class="date">{{ new Date(c.createdAt * 1000).toLocaleDateString() }}</span>
              </li>
          </ul>
          <p v-if="campaigns.length === 0">Keine Kampagnen vorhanden.</p>
      </div>
  </div>
</template>
<script>
export default {
    data() { return { campaigns: [] } },
    mounted() { this.load() },
    methods: {
        async load() {
             try {
                 const res = await fetch(OC.generateUrl('/apps/clubsuite-newsletter/api/campaigns'))
                 if(res.ok) {
                     const data = await res.json()
                     this.campaigns = Array.isArray(data) ? data : (data.rows || [])
                 }
             } catch(e) { console.error(e) }
        },
        async create() {
            const subject = prompt('Betreff der Kampagne?')
            if(!subject) return
            try {
                await fetch(OC.generateUrl('/apps/clubsuite-newsletter/api/campaigns'), {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json', 'requesttoken': OC.requestToken},
                    body: JSON.stringify({ subject, bodyHtml: '<p>Inhalt hier...</p>' })
                })
                this.load()
            } catch(e) { console.error(e) }
        }
    }
}
</script>
<style scoped>
.app-content { display: flex; height: 100vh; }
.app-navigation { width: 300px; border-right: 1px solid var(--color-border); padding-top: 10px; }
.app-navigation ul { list-style: none; padding: 0; }
.app-navigation li a { display: block; padding: 10px 20px; color: var(--color-main-text); text-decoration: none; font-weight: bold; }
#app-content { padding: 20px; flex: 1; overflow-y: auto; }
.campaign-list { list-style: none; padding: 0; margin-top: 20px; }
.campaign-item { padding: 10px; border-bottom: 1px solid var(--color-border); display: flex; justify-content: space-between; }
button.primary { background-color: var(--color-primary); color: var(--color-primary-text); border: none; padding: 10px; border-radius: 3px; cursor: pointer; }
</style>
