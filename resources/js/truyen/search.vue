<template>
    <!-- This is an example component -->

  <metainfo>
    <template v-slot:title="{ content }">{{ content }}</template>
    
  </metainfo>  <header />
    <div class="fixrow row">
      
      <div v-if="status2 != 1 && status2 != 3" >
       
    <div class="col mt-0">
    <div  class='mt-1 mx-2 items-center justify-center from-teal-100 via-teal-300 to-teal-500 '>
      <!-- <div class="text-center">
        Công cụ miễn phí giúp bạn dễ dàng lấy id , UID Facebook , TikTok , instagram một cách dễ dàng.
      </div> -->
      <div  class='w-full max-w-lg px-8 py-4 mx-auto bg-white rounded-lg shadow-xl'>
         
          <div class='max-w-md mx-auto  space-y-6'>
         
                <div class="col-lg-6">
                    <div class="form-group">
                      <!-- <label for="countries2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Chọn nền tảng (Choose platform)</label> -->
      
                <!-- <select  id="countries2" class="
                selectpicker sp1 form-control"   @change="onChange()"   name="nhamang" v-model="social">
                    <option v-for="option in options" :value="option.value">
                      {{ option.text }}
                    </option>
                  </select> -->

                    </div>
                  </div>
                  <label for="inputlienket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                  Tìm kiếm truyện trong hệ thống Hust Media

                </label>
                    
<input class="form-control form-control-alternative"  id="inputlienket" v-model="lienketchay"
 placeholder="Nhập tên truyện" />
<div v-if="thanhcong">  
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
      <div class="flex flex-col items-center justify-center py-2">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-200 to-purple-600 shadow-lg transform rotate-6 rounded-3xl">

        </div>
        <div class="relative px-4 py-3 bg-white shadow-lg sm:rounded-3xl sm:p-20">
         <h2 class="text-3xl text-break font-bold">
          kết quả {{ thanhcong }}</h2>
          <div style="text-decoration: none" >
            <button @click="saochep(thanhcong)" type='button'
            class='flex break-inside bg-white text-black border-2 border-black rounded-3xl px-6 py-3 mb-4 w-full dark:bg-slate-800 dark:text-white'>
            <div class='m-auto'>
              <div class='flex items-center justify-start flex-1 space-x-4'>
                <span class='font-medium mb-[-2px]'>Sao chép ( Copy ) </span>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='#000000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                  <path d='M5 12h13M12 5l7 7-7 7' />
              </svg>
              </div>
            </div>
          </button>
        </div>
        </div></div></div>
    </div>
              <div  v-if="chondichvu == 1" x-show="showen">
    
              
            </div>
                <button  @click="xacnhan" :disabled="disableButton"
                class='flex break-inside bg-purple-400 hover:bg-purple-300 rounded-3xl px-8 py-2 mb-3 w-full dark:bg-slate-800 dark:text-white'>
                <div class='flex items-center justify-between flex-1'>
                  <div v-if="nutxuly == '1'" class="spinner-border" role="status">
                 
                  </div>
               
                  <span class='text-lg font-medium text-white'> {{ nutorder }} </span>
                  <svg  width='17' height='17' viewBox='0 0 17 17' fill='none' xmlns='http://www.w3.org/2000/svg'>
                    <path fillRule='evenodd' clipRule='evenodd'
                      d='M0 8.71423C0 8.47852 0.094421 8.25246 0.262491 8.08578C0.430562 7.91911 0.658514 7.82547 0.896201 7.82547H13.9388L8.29808 2.23337C8.12979 2.06648 8.03525 1.84013 8.03525 1.60412C8.03525 1.36811 8.12979 1.14176 8.29808 0.974875C8.46636 0.807989 8.6946 0.714233 8.93259 0.714233C9.17057 0.714233 9.39882 0.807989 9.5671 0.974875L16.7367 8.08499C16.8202 8.16755 16.8864 8.26562 16.9316 8.3736C16.9767 8.48158 17 8.59733 17 8.71423C17 8.83114 16.9767 8.94689 16.9316 9.05487C16.8864 9.16284 16.8202 9.26092 16.7367 9.34348L9.5671 16.4536C9.39882 16.6205 9.17057 16.7142 8.93259 16.7142C8.6946 16.7142 8.46636 16.6205 8.29808 16.4536C8.12979 16.2867 8.03525 16.0604 8.03525 15.8243C8.03525 15.5883 8.12979 15.362 8.29808 15.1951L13.9388 9.603H0.896201C0.658514 9.603 0.430562 9.50936 0.262491 9.34268C0.094421 9.17601 0 8.94995 0 8.71423Z'
                      fill='white' />
                  </svg>
                </div>
              </button>
             
                <div v-if="chondichvu == 2"
                    class="bg-white border border-slate-300 shadow-lg rounded-md gap-4 p-4  flex-row items-center justify-center">
                    <section class="w-6 flex flex-col items-center justify-start">
                        <svg width="100%" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.5 13.25C10.9518 13.25 13.75 10.4518 13.75 7C13.75 3.54822 10.9518 0.75 7.5 0.75C4.04822 0.75 1.25 3.54822 1.25 7C1.25 10.4518 4.04822 13.25 7.5 13.25Z"
                                stroke="#21ce8f" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.3269 7.96143C4.80767 9.69219 6.73075 10.7499 8.46152 10.2691C9.51921 9.8845 10.3846 9.01912 10.6731 7.96143"
                                stroke="#21ce8f" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M10.0481 5.55767C9.91536 5.55767 9.80774 5.45005 9.80774 5.31729C9.80774 5.18453 9.91536 5.0769 10.0481 5.0769"
                                stroke="#21ce8f" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M10.0481 5.5577C10.1809 5.5577 10.2885 5.45008 10.2885 5.31732C10.2885 5.18456 10.1809 5.07693 10.0481 5.07693"
                                stroke="#21ce8f" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.95193 5.55767C4.81917 5.55767 4.71155 5.45005 4.71155 5.31729C4.71155 5.18453 4.81917 5.0769 4.95193 5.0769"
                                stroke="#21ce8f" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.95197 5.5577C5.08473 5.5577 5.19235 5.45008 5.19235 5.31732C5.19235 5.18456 5.08473 5.07693 4.95197 5.07693"
                                stroke="#21ce8f" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </section>
                    <section class=" flex flex-col items-start justify-end gap-1">
                        <h1 class="text-base font-semibold text-zinc-800 antialiased">Tổng : Miễn Phí</h1>
                        <p class="text-sm font-medium text-zinc-400 antialiased">


                        </p>
                    </section>
                  
                
            </div>
        </div>
        <div v-if="chondichvu != 1" class="text-center">
          <router-link type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" to="/truyen-tranh/home">Trang chủ</router-link>
          
  </div>
        </div>

<v-runtime-template :template="hientruyen"></v-runtime-template>
        <div class="cards">
             
        <Adsense
    data-ad-client="ca-pub-4574266110812955"
     data-ad-slot="8795043992"
     data-full-width-responsive="no"
     ins-class="display: block; height: 50px;"
     ins-style="display: block; height: 50px;"
     data-ad-format="horizontal"
     >
  </Adsense>

</div>

        <br><br><br><br>
      </div>
    </div>
  
  </div>
 


  </div>
  </template>
<style>
.containertruyen {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  
  .itemtruyen {
    display: block;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
  }
  
  .itemtruyen img {
    display: block;
    width: 100%;
    height: auto;
  }
  
  .itemtruyen p {
    margin: 0;
    padding: 10px;
    font-size: 14px;
    font-weight: bold;
  }
  
  .itemtruyen .chapter-name {
    font-weight: normal;
    color: #888;
  }
  </style>
  <script>
//   import $ from 'jquery' ;
import VRuntimeTemplate from "vue3-runtime-template";
import { useMeta } from 'vue-meta' ;
    import Swal from 'sweetalert2' ;
    import '../../../node_modules/bootstrap-select/dist/css/bootstrap-select.css' ;
    import '../../../node_modules/bootstrap-select/dist/css/bootstrap-select.min.css' ;
    import '../../../node_modules/bootstrap-select/js/bootstrap-select.js' ;
    import { computed } from "vue";
    export default {

  setup () {
    useMeta(
      computed(() => ({
    og: {
    image: 'https://hust.media/img/icon/idcards.png' ,
    title: 'Tìm kiếm truyện Hust Media',
    description : 'Hust Media Pro.' 
  },link: [
      { rel: 'icon', href: 'https://hust.media/img/icon/idcards.png' }
    ],
  description: {
      content: 'Tìm kiếm truyện Hust Media.' }
   ,   meta: [{
    name: 'keywords' ,
      content: 'Tìm lấy id ,Tìm lấy id Facebook,Tìm lấy id TikTok ,find id facebook,get id facebook' 
    },
  ]

  }
  
  )))
  },
      data (){
            return {
              ok2 : this.$cookies.get("apikey") ,
              name2 : '',
              disableButton: false,
                urlsplit: '0928889798' ,
                theloai: null ,
                selected: null ,
      options: [
        { text: 'Chọn 1 lựa chọn', value: 'chonmxh' } , 
        { text: 'Facebook', value: 'facebook' } , 
        { text: 'TikTok', value: 'tiktok' } ,
        { text: 'Instagram', value: 'instgram' }
      ],
     
      options2: null ,
      options3: null ,
                lienket: null ,
                chondichvu: null,
                chondichvu2: null ,
                hientruyen: null,
                soluongtang: null ,
                lienketchay: null ,
                timeuoctinh: null,
                status: null ,
                status2: null ,
                nutorder: 'Submit (xác nhận)' ,
                nutxuly: null ,
                opentele: null ,
                chedo: null ,
                phonechuan: null ,
                nhamang: null,
                thanhcong : '' ,
                selected: null ,
                social: null,
                chietkhau: null,
                ketqua: null  ,
                money: null ,
                socmt: null ,
                response: null,
                status3: null ,
                tientra: null ,
                doisodt: null,
                message: null ,
                magiaodich : '' ,
                age : '',
                info : ''
            }
        },
        components: {
    VRuntimeTemplate
  },
  
        mounted() {
          
     

    },
        created() {
            
                this.fetchData();
                this.intervalFetchData() ;
                console.log(this.getCookie('urlsdt'));
                $('.selectpicker').selectpicker('refresh');
                setTimeout(() => {    
                    console.log(this.getCookie('urlsdt'));
                    $('.selectpicker').selectpicker('refresh');
                    setTimeout(() => {     
         $('.sp1').selectpicker('toggle');  }, 300)
                }, 300) ;
            },
        methods : {
          countamount()
          {
            this.tientra=this.tientra1*this.soluongtang*( 100 - this.chietkhau )/ 100 ;
          },
          xacnhan(){
            this.disableButton = true;
            this.chondichvu = 1 ;
            this.nutxuly = 1 ;
            this.nutorder = 'chờ xíu nhé' ;
            axios
         .post('https://hust.media/truyen-tranh/search.php', {
            keyword: this.lienketchay
      // binhluan: this.binhluan
    })
    .then( response => (
    console.log(response.data ) ,
    this.dathang(response )
    ))
    .catch(error => console.log(error) ,
        // this.age = info
        // this.disableButton = false
       
       
  
        ) ;
          },
          dathang(response){
this.nutorder = 'đặt tiếp luôn nào' ,
this.disableButton = false
this.nutxuly = 0 ,
this.hientruyen = response.data 
//             this.info1 = response.data ,
//       this.status = this.info1.status     ,
//         this.message = this.info1.message  
//         if ( this.status == 0  )
//       {
//         Swal.fire({
//   title: this.message ,
//   heightAuto : false,
 
// });
//       }
//       else
//       {
//         this.thanhcong =  this.message ;
//       }
          } ,
          fetchData() {
     
      
      var urlsplit =  '0928889798' ;
      console.log(urlsplit) ;
          }
          ,
          saochep(urlsplit) {
        Swal.fire({
  title: 'Sao chép thành công' 
 
})
                navigator.clipboard.writeText(urlsplit);
               
      }, 
    countLine(){
var comment= this.name2;
this.socmt=(comment=='') ? '0' : (comment.split("\n").length)   ;
this.tientra=this.tientra1*this.socmt*( 100 - this.chietkhau )/ 100 ;
},
    onChange() {
    
   this.thanhcong = null ;
   
if ( this.social == 'facebook' )
{
    this.options2 =  [
        { name: 'Lấy id ,uid từ liên kết', code: 'facebook' } ,
        { name: 'Lấy mã 2fa', code: '2fa' }
      ]
}
else if ( this.social == 'chonmxh' )
{
    this.options2 =  [
        { name: 'Ấn Chọn nền tảng nhé', code: '' }
      ]
}
else if ( this.social == 'tiktok'  )
{
    this.options2 =  [
        { name: 'Lấy uid trang cá nhân', code: 'profiletiktok' } , 
        { name: 'Lấy id video', code: 'videotiktok' } 
      ]
}
else if ( this.social == 'instgram' )
{
    this.options2 =  [
        { name: 'Lấy uid trang cá nhân', code: 'profileinstgram' } ,
        { name: 'Lấy id post instgram', code: 'idvideoinstgram' } ,
        { name: 'Lấy uid post instgram', code: 'uidvideoinstgram' } ,
      ]
}
setTimeout(() => {    
                 
                 $('.sp2').selectpicker('refresh');
                 setTimeout(() => {     
                     $('.sp2').selectpicker('toggle');;  }, 300)
             }, 300) ;
    },
    onChange2() {
        this.thanhcong = null ;

    if(!this.theloai){
                    alert('Please Ấn chọn nền tảng nha')
                    return
                }
               axios
         .post('./checkdichvu', {
            theloai2: this.theloai ,
    })
    .then( response => (
    console.log(response.data ) ,
    this.testFunction3(response )
    ))
    .catch(error => console.log(error) ,
        ) ;
    
    },
    onChange3() {
       

       if(!this.theloai){
                       alert('Please điền đầy đủ thông tin')
                       return
                   }
                  axios
            .post('./checkdichvu', {
              dichvu2: this.dichvu ,
       })
       .then( response => (
       console.log(response.data ) ,
       this.testFunction5(response )
       ))
       .catch(error => console.log(error) ,
           ) ;
       
       },
    testFunction(response)
    {
      this.info1 = response.data ,
      this.status = this.info1.status     ,
        this.message = this.info1.message  

    },

    getCookie(cookieName) {
  let cookie = {};
  document.cookie.split(';').forEach(function(el) {
    let [key,value] = el.split('=');
    cookie[key.trim()] = value;
  })
  return cookie[cookieName];
},
    testFunction2(response)
    {
      this.options2 = response.data ;

console.log(this.options2) ;
console.log(this.options) ;
        //   Swal.fire(this.info.message ) ;

  setTimeout(() => {    
                 
                    $('.sp2').selectpicker('refresh');
                    setTimeout(() => {     
                        $('.sp2').selectpicker('toggle');;  }, 300)
                }, 300) ;
    },
    testFunction3(response)
    {
      this.options3 = response.data , 
      this.info = response.data ,
      
      this.chondichvu = 1 ,
      console.log(this.options3);
      console.log(this.name);
      setTimeout(() => {    
                 
                 $('.sp3').selectpicker('refresh');
                 setTimeout(() => {     
                     $('.sp3').selectpicker('toggle');;  }, 300)
             }, 300) ;
    },
    testFunction5(response)
    {
      this.chondichvu2 = 1 ,
      this.info = response.data ,
      this.service = this.info.id ,
      this.maxorder = this.info.maxorder ,
      this.minorder = this.info.minorder ,
      this.tientra1 = this.info.money ,
      this.timeuoctinh = this.info.time ,
      this.name = this.info.name ,
      this.content = this.info.content,
      this.tientra=this.tientra1*this.soluongtang*( 100 - this.chietkhau )/ 100 
    },
    testFunction4(response)
    {
     
      this.info = response.data ,
      this.chietkhau = this.info.chietkhau ,
      this.money = this.info.money 
    },
    
           
            btcTrkAPICall: function () {
              this.chedo = 'checkxu3' ;
              axios    
                  .post('./checkmomo', {
          apikey: this.ok2 ,
      magiaodich: this.magiaodich ,
      chedo: this.chedo 
    })  
                  .then(response => (this.testFunction4(response  ))  )  
                  .catch(error => console.log(error) ,
  
                  console.log(this.btctrk) 
                  )    
          },
          intervalFetchData: function () {
              setInterval(() => {    
                  this.btcTrkAPICall();
                  }, 5000 );    
          } ,
        
        }
    }
    
  </script>