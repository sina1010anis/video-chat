<template>
    <div class="container">
        <div class="large-12 medium-12 small-12 cell">
          <label>File
            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
          </label>
          <br>
          <progress max="100" :value.prop="uploadPercentage"></progress>
          <br>
          <button v-on:click="submitFile()">Submit</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "test",
    data:()=>({
        file:'',
        lod:0
    }),
    methods:{
        submitFile(){
            const data = new FormData();
            data.append('file' , this.file)
            axios.post( './upload',
                data,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function( progressEvent ) {
                        this.uploadPercentage = parseInt(Math.round( ( progressEvent.loaded / progressEvent.total ) * 100 ));
                    }.bind(this)
                }
            ).then(function(){
                console.log('SUCCESS!!');
            })
                .catch(function(){
                    console.log('FAILURE!!');
                });
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
            console.log(this.file)
        },
        start_video(){
            if ('mediaDevices' in navigator && 'getUserMedia' in navigator.mediaDevices){
                navigator.mediaDevices.getUserMedia({video:true}).then((st)=>{
                    const video = document.querySelector('video')
                    video.srcObject = st
                    video.play();
                })
            }else {
                alert('Error')
            }
        }
    }
}
</script>

<style scoped>
</style>
