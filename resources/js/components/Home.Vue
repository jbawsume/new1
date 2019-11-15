<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                    <ApolloQuery :query="require('./graphql/queries/Categories.gql')">
                          <template slot-scope="{ result: { data, loading } }">
                           <!-- Some content -->
                           <div v-if="loading">Loading....</div>
                           <ul v-else>
                             <li v-for="category of data.categories" :key="category.id" class="user">
                              {{ category.id }} {{ category.name}}
                             </li>
                           </ul>
                          </template>
                          </ApolloQuery>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import gql from 'graphql-tag'
    export default {
        name: 'home',
        components:{

        },
        data(){
          return{
            categories:[]
          }
        },
        apollo: {
          categories: gql`{
            categories{
              id
              name
            }
          }`,
        },
    }
</script>
