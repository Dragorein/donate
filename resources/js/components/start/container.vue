<template>
<v-app>
    <navbar/>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="pb-12">
                    <v-card>
                        <v-card-title>Buat Penggalangan Baru</v-card-title>
                        <v-stepper v-model="e1" vertical>
                                <v-stepper-step :complete="e1 > 1" step="1" color="error">Data Diri</v-stepper-step>

                                <v-stepper-content step="1">
                                    <v-card-text>
                                        <!-- step 1 -->
                                        <v-form>
                                            <v-text-field label="Nama Kamu" name="nama" prepend-inner-icon="person" type="text" :rules="namaRules" v-model="nama" required filled clearable/>
                                            <v-text-field label="Linkedin atau sosial media kamu" name="mediasosial" prepend-inner-icon="mdi-account-group-outline" type="text" :rules="medsosRules" v-model="medsos" required filled clearable/>
                                            <v-text-field label="Email" name="email" prepend-inner-icon="mail" type="text" :rules="emailRules" v-model="email" required filled clearable/>
                                            <v-text-field label="Nomor Handphone" name="noHandphone" prepend-inner-icon="phone" type="text" :rules="noHandphoneRules" v-model="noHandphone" :counter="14" required filled clearable/>
                                            <v-text-field label="Alamat" name="Alamat" prepend-inner-icon="mdi-folder-home" type="text" :rules="alamatRules" v-model="alamat" required filled clearable/>
                                            <v-btn color="error" @click="e1 = 2" class="mr-2">Lanjut</v-btn>
                                            <v-btn text class="mr-2" @click="goBack">Batal</v-btn>
                                        </v-form>
                                    </v-card-text>
                                </v-stepper-content>

                                <v-stepper-step :complete="e1 > 2" step="2" color="error">Detail</v-stepper-step>

                                <v-stepper-content step="2">
                                    <v-card-text>
                                        <!-- step 2 -->
                                        <v-form>
                                            <v-select prepend-inner-icon="mdi-file-document-box-check" :items="items"  v-model="tipe" filled label="Pilih Kategori Yang Sesuai" dense></v-select>
                                            <v-text-field label="Judul Penggalangan Dana" name="judul" prepend-inner-icon="mdi-mastodon-variant" type="text" :counter="50" :rules="judulRules" v-model="judul" required filled clearable/>
                                            <v-text-field label="Target Donasi" name="target" prepend-inner-icon="mdi-database" prefix="Rp." type="curency" :rules="targetRules" v-model="target" required filled clearable/>
                                            <v-text-field label="Penerima Manfaat" name="penerima" prepend-inner-icon="mdi-account-heart" type="text" :rules="penerimaRules" v-model="penerima" required filled clearable/>
                                            <v-text-field label="Cerita" name="cerita" prepend-inner-icon="mdi-chat-processing" type="text" :rules="ceritaRules" v-model="cerita" required filled clearable/>
                                                <v-menu
                                                    ref="menu"
                                                    v-model="menu"
                                                    :close-on-content-click="false"
                                                    :return-value.sync="date"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="290px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                    <!-- <v-text-field
                                                        v-model="date"
                                                        label="Batas Waktu Penggalangan Dana"
                                                        prepend-inner-icon="event"
                                                        readonly
                                                        v-on="on" :rules="waktuRules" required filled name="Waktu"
                                                    ></v-text-field> -->
                                                    <v-text-field
                                                        v-model="date"
                                                        label="Batas Waktu Penggalangan Dana"
                                                        prepend-inner-icon="event"
                                                        readonly
                                                        v-on="on" required filled name="Waktu"
                                                    ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="date" no-title scrollable>
                                                    <v-spacer></v-spacer>
                                                    <v-btn text color="red" @click="menu = false">Cancel</v-btn>
                                                    <v-btn text color="primary" @click="$refs.menu.save(date)">OK</v-btn>
                                                    </v-date-picker>
                                                </v-menu>
                                                <v-btn color="error" @click="e1 = 3" class="mr-2">Lanjut</v-btn>
                                                <v-btn text class="mr-2" @click="goBack">Batal</v-btn>

                                        </v-form>

                                    </v-card-text>
                                </v-stepper-content>

                                <v-stepper-step :complete="e1 > 3" step="3" color="error">Foto</v-stepper-step>

                                <v-stepper-content step="3">
                                    <v-card-text>
                                        <v-form>
                                            <v-file-input label="Pilih salah satu foto utama untuk penggalangan danamu" filled prepend-inner-icon="mdi-camera"></v-file-input>
                                            <v-btn color="error" @click="e1 = 4 " class="mr-2">Lanjut</v-btn>
                                            <v-btn text class="mr-2" @click="goBack">Batal</v-btn>
                                        </v-form>
                                    </v-card-text>
                                </v-stepper-content>

                                <v-stepper-step :complete="e1 > 4" step="4" color="error">Konfirmasi</v-stepper-step>

                                <v-stepper-content step="4">
                                    <v-card-text>
                                        <v-form>
                                            <v-card
                                                max-width="644"
                                                outlined
                                            >
                                                <v-list-item three-line>
                                                    <v-list-item-content>
                                                        <v-list-item-subtitle>Saya setuju dengan Syarat & Ketentuan Donasi di kindly, termasuk biaya administrasi platform sebesar 5% dari total donasi online yang terkumpul.</v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </v-list-item>

                                                <v-card-actions>
                                                    <v-checkbox
                                                    v-model="checkbox"
                                                    label="Apakah Anda Setuju?"
                                                    required
                                                    ></v-checkbox>
                                                </v-card-actions>
                                            </v-card>
                                            <v-btn color="error" @click="submit()" class="mr-2 mt-5">Daftar</v-btn>
                                            <v-btn text @click="e1 = 1" class="mr-2 mt-5">Kembali</v-btn>
                                        </v-form>
                                    </v-card-text>
                                </v-stepper-content>

                        </v-stepper>
                    </v-card>
                </v-container>
            </section>
        </div>
    </main>

    <footbar/>
</v-app>
</template>

<script>
export default {
    data: () => ({
        date: new Date().toISOString().substr(0, 10),
        menu: false,
        e1: 1,
        valid: true,
        // step 1
        nama: "",
        namaRules: [v => !!v || "Wajib untuk di isi"],
        medsos: "",
        medsosRules: [v => !!v || "Wajib untuk di isi"],
        email: "",
        emailRules: [v => !!v || "Wajib untuk di isi"],
        noHandphone: "",
        noHandphoneRules: [
            v => !!v || "No.Handphone is required",
            v => v && v.length <= 14
        ],
        alamat: "",
        alamatRules: [v => !!v || "Wajib untuk di isi"],
        
        // step 2
        tipe: "",
        items: ['Pendidikan', 'Bencana Alaman', 'Kemanusiaan', 'Lingkungan','Kegiata Sosial','Saran dan Infrastruktur'],
        judul: "",
        judulRules: [
            a => !!a || "Wajib untuk di isi",
            a => a && a.length <= 50
        ],
        target: "",
        targetRules: [v => !!v || "Wajib untuk di isi"],
        penerima: "",
        penerimaRules: [v => !!v || "Wajib untuk di isi"],
        cerita: "",
        ceritaRules: [
            v => !!v || "Rician penggunaan dana terlalu pendek (Minimal 30 karakter)",
            v => v && v.length >= 30
        ],
        // password: "",
        // passwordRules: [v => !!v || "Password is required"],
        

    }),
    methods: {
        submit() {
            console.log(this.$data);
            axios
                .post("/user/start", {
                    judul: this.$data.judul,
                    cerita: this.$data.cerita,
                    noHandphone: this.$data.noHandphone,
                    // tipe: this.$data.tipe,
                    total: this.$data.target,
                    tujuan: this.$data.penerima
                })
                .then(data => {
                    this.$router.push({ path: '/' });
                })
                .catch(e => {
                    console.error(e);
                })
        },
        submitForm(e) {
            e.preventDefault();
        },
        reroutes: function(url) {
            this.$router.push({ path: url });
        },
        goBack: function () {
            this.$router.go(-1);
        }
    }
};
</script>
