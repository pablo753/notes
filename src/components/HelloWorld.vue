<template>
  <div class="container bootstrap snippet">
    <div class="row">
      <ul class="notes">
        <li v-for="(a,i) in arreglo" v-bind:key="a">
          <div v-bind:class="`rotate-${(i % 2 == 0)? 1: 2} ${a.color}`">
            <small><span contenteditable="">{{a.fecha}}</span></small>
            <h4><span contenteditable="">{{ a.titulo }}</span></h4>
            <p><span contenteditable="">{{a.texto}}</span></p>
            <a @click="eliminar(a)" class="text-danger pull-right"><i class="fa fa-trash-o "></i></a>
            <button v-for="color in colores" v-bind:class="`col-3 ${color} btn`" v-bind:key="color" style="border-color: black;" @click="cambiaColor(a, color)"></button>
          </div>
        </li>
      </ul>
    </div>
    <button class="btn btn-success" @click="nuevo()"><i class="fa fa-plus"></i> Agregar</button>
  </div>
</template>

<script>
  import 'jquery'
  import 'bootstrap/dist/css/bootstrap.min.css'
  import 'bootstrap/dist/js/bootstrap.min'
  import 'font-awesome/css/font-awesome.css'
  
  export default {
    name: 'HelloWorld',
    props: {
      msg: String
    },
    data: function () {
      return {
        arreglo: [
          {
            id: 0,
            fecha: "12:03:28 12-04-2014",
            titulo: "Awesome title",
            texto: "The years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            color: "lazur-bg"
          },
          {
            id: 1,
            fecha: "12:03:28 12-04-2014",
            titulo: "Awesome date",
            texto: "The years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            color: "red-bg"
          },
          {
            id: 2,
            fecha: "12:03:28 12-04-2014",
            titulo: "Awesome proj",
            texto: "The years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            color: "yellow-bg"
          },
        ],
        contador: 2,
        colores: [
          'lazur-bg',
          'red-bg',
          'navy-bg',
          'yellow-bg',
        ]
      }
    },
    methods: {
      eliminar: function (a) {
        console.log(this.arreglo)
        for (let i = 0; i < this.arreglo.length; i ++) {
          if (a.id == this.arreglo[i].id) {
            this.arreglo.splice(i, 1)
            return;
          }
        }
      },
      cambiaColor: function (a, color) {
        a.color = color
      },
      nuevo: function () {
        console.log("AGREGAR")
        let vm = this
        this.contador ++
        let obj = {
          id: vm.contador,
          fecha: "Fecha",
          titulo: "Titulo",
          texto: "Texto",
          color: "lazur-bg"
        }
        this.arreglo.push(obj)
        console.log(this.arreglo)
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  
  body{margin-top:20px;}
  
  ul.notes li {
    margin: 10px 40px 50px 0px;
    float: left;
  }
  
  ul.notes li, ul.tag-list li {
    list-style: none;
  }
  
  ul.notes li div small {
    position: absolute;
    top: 5px;
    right: 5px;
    font-size: 10px;
  }
  
  div.rotate-1 {
    -webkit-transform: rotate(-6deg);
    -o-transform: rotate(-6deg);
    -moz-transform: rotate(-6deg);
  }
  
  div.rotate-2 {
    -o-transform: rotate(4deg);
    -webkit-transform: rotate(4deg);
    -moz-transform: rotate(4deg);
    position: relative;
    top: 5px;
  }
  
  .lazur-bg {
    background-color: #23c6c8;
    color: #ffffff;
  }
  
  .red-bg {
    background-color: #ed5565;
    color: #ffffff;
  }
  
  .navy-bg {
    background-color: #1ab394;
    color: #ffffff;
  }
  
  .yellow-bg {
    background-color: #f8ac59;
    color: #ffffff;
  }
  
  ul.notes li div {
    text-decoration: none;
    color: #000;
    display: block;
    height: 210px;
    width: 210px;
    padding: 1em;
    -moz-box-shadow: 5px 5px 7px #212121;
    -webkit-box-shadow: 5px 5px 7px rgba(33, 33, 33, 0.7);
    box-shadow: 5px 5px 7px rgba(33, 33, 33, 0.7);
    -moz-transition: -moz-transform 0.15s linear;
    -o-transition: -o-transform 0.15s linear;
    -webkit-transition: -webkit-transform 0.15s linear;
  }
</style>
