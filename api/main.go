package main

import (
	"database/sql"
	"fmt"
	"io"
	"log"
	"math/rand"
	"net/http"
	"net/url"
	"os"
	"os/exec"
	"path/filepath"
	"runtime"
	"strconv"
	"time"

	_ "github.com/go-sql-driver/mysql"
	"github.com/labstack/echo/v4"
	"github.com/labstack/echo/v4/middleware"
)

type Transaksip struct {
	Kd_transaksi      string    `json:"kd_transaksi"`
	Nama_users        string    `json:"nama_users"`
	Nama_seller       string    `json:"nama_seller"`
	Nama_barang       string    `json:"nama_barang"`
	Jumlah_barang     int       `json:"jumlah_barang"`
	Total_harga       float64   `json:"total_harga"`
	Tgl_transaksi     time.Time `json:"tgl_transaksi"`
	Status_pembayaran string    `json:"status_pembayaran"`
	Metode_pembayaran string    `json:"metode_pembayaran"`
	Batas_pembayaran  string    `json:"batas_pembayaran"`
}


type Barang struct {
    ID           int     `json:"id"`
    Kd_barang    string  `json:"kd_barang"`
    Nama_b       string  `json:"nama_b"`
    Deskripsi    string  `json:"deskripsi"`
    Stok_b       int     `json:"stok_b"`
    Harga_b      float64 `json:"harga_b"`
    Gambar_p     string  `json:"gambar_product"`
}

type Pengirimann struct {
    KdPengiriman    string `json:"kd_pengiriman"`
    KdTransaksi     string `json:"kd_transaksi"`
    NamaKurir       string `json:"nama_kurir"`
    AlamatTujuan    string `json:"alamat_tujuan"`
    StatusPengiriman string `json:"status_pengiriman"`
    Ongkir          int    `json:"ongkir"`
    KdUser          string `json:"kd_user"`
    NamaUsers       string `json:"nama_users"`
	NamaSeller       string `json:"nama_seller"`
}

type Pengiriman struct {
    ID               int    `json:"id"`
    Kd_pengiriman    string `json:"kd_pengiriman"`
    Nama_kurir       string `json:"nama_kurir"`
    Kd_user          string `json:"kd_user"`
    Alamat_tujuan    string `json:"alamat_tujuan"`
    Kd_transaksi     string `json:"kd_transaksi"`
    Kd_seller        string `json:"kd_seller"`
    Status_pengiriman string `json:"status_pengiriman"`
}

type Users struct {
	ID          int       `json:"id"`
	Kd_user     string    `json:"kd_user"`
	Nama_users  string    `json:"nama_users"`
	Email       string    `json:"email"`
	Username    string    `json:"username"`
	Pass        string    `json:"pass"`
	No_wa       int64     `json:"no_wa"`
	Alamat      string    `json:"alamat"`
	Nik         int64     `json:"nik"`
	Tgl_lahir   time.Time `json:"tgl_lahir"`
	Foto_profile string    `json:"foto_profile"`
}

type Seller struct {
	ID           int       `json:"id"`
	Kd_seller    string    `json:"kd_seller"`
	Nama_Seller  string    `json:"nama_seller"`
	Email        string    `json:"email"`
	Username     string    `json:"username"`
	Pass         string    `json:"pass"`
	No_wa        int64     `json:"no_wa"`
	Alamat       string    `json:"alamat"`
	Nik          int64     `json:"nik"`
	Tgl_lahir    string		`json:"tgl_lahir"`
	Foto_profile string    `json:"foto_profile"`
}

type Transaksi struct {
	ID                int       `json:"id"`
	Kd_user           string    `json:"kd_user"`
	Kd_seller         string    `json:"kd_seller"`
	Kd_transaksi      string    `json:"kd_transaksi"`
	Kd_barang         string    `json:"kd_barang"`
	Jumlah_barang     int       `json:"jumlah_barang"`
	Total_harga       float64   `json:"total_harga"`
	Tgl_transaksi     time.Time `json:"tgl_transaksi"`
	Status_pembayaran string    `json:"status_pembayaran"`
	Metode_pembayaran string    `json:"metode_pembayaran"`
	Batas_pembayaran  time.Time `json:"batas_pembayaran"`
}

type TransaksiResponse struct {
    KdTransaksi      string    `json:"kd_transaksi"`
    NamaUser         string    `json:"nama_user"`
    NamaSeller       string    `json:"nama_seller"`
    NamaBarang       string    `json:"nama_barang"`
    JumlahBarang     int       `json:"jumlah_barang"`
    TotalHarga       float64   `json:"total_harga"`
    TglTransaksi     time.Time `json:"tgl_transaksi"`
    StatusPembayaran string    `json:"status_pembayaran"`
}


type Chat struct {
	ID       int    `json:"id"`
	KDUser   string `json:"kd_user"`
	Kd_seller   string `json:"kd_seller"`
	KdChat   string `json:"kd_chat"`
	Tanggal  string `json:"tanggal"`
	Jam      string `json:"jam"`
	TextChat string `json:"text_chat"`
}

type Troli struct {
	ID            int     `json:"id"`
	Kd_user       string  `json:"kd_user"`
	Kd_seller     string  `json:"kd_seller"`
	Kd_barang     string  `json:"kd_barang"`
	Gambar_p      string  `json:"gambar_p"`
	Harga_b       float64 `json:"harga_b"`
	Jumlah_barang int     `json:"jumlah_barang"`
	Nama_seller   string  `json:"nama_seller"`
	Nama_b        string  `json:"nama_b"`
}

type Seller_T struct {
	Kd_seller   string `json:"kd_seller"`
	Nama_seller string `json:"nama_seller"`
}

type Barang_T struct {
	Kd_barang string `json:"kd_barang"`
	Nama_b    string `json:"nama_b"`
	Harga_b   float64 `json:"harga_b"`
}

type ChatInput struct {
	TextChat string `json:"text_chat"`
}

type TotalStok struct {
    Total int `json:"total"`
}

type TotalBarang struct {
    Total int `json:"total"`
}

func generateKodePengiriman() string {
    rand.Seed(time.Now().UnixNano())
    randomNum := rand.Intn(1000) // Generate random number between 0 and 999
    return fmt.Sprintf("JNE%03d", randomNum) // Format the number to have 3 digits
}

func generateKodeBarang() string {
	return "BRG" + strconv.FormatInt(time.Now().Unix(), 5)
}

func openURL(url string) error {
	var err error
	switch runtime.GOOS {
	case "linux":
		err = exec.Command("xdg-open", url).Start()
	case "windows":
		err = exec.Command("rundll32", "url.dll,FileProtocolHandler", url).Start()
	case "darwin":
		err = exec.Command("open", url).Start()
	default:
		err = fmt.Errorf("unsupported platform")
	}
	return err
}


func generateKdChat() string {
	// Fungsi untuk menghasilkan kd_chat yang unik
	return "CHT" + time.Now().Format("20060102150405")
}

func generateKodeUser() string {
	rand.Seed(time.Now().UnixNano())

	randNumber := rand.Intn(1000)
	kodeUser := fmt.Sprintf("S01%03d", randNumber)

	return kodeUser
}
func generateKodeSeller() string {
	rand.Seed(time.Now().UnixNano())

	randNumber := rand.Intn(1000)
	kodeUser := fmt.Sprintf("S01%03d", randNumber)

	return kodeUser
}

func setUserContext(next echo.HandlerFunc) echo.HandlerFunc {
    return func(c echo.Context) error {
        kd_user := c.Request().Header.Get("kd_user")
        if kd_user == "" {
            return echo.NewHTTPError(http.StatusUnauthorized, "User not logged in")
        }
        c.Set("kd_user", kd_user)
        return next(c)
    }
}


func main() {
	db, err := sql.Open("mysql", "root:@tcp(127.0.0.1:3306)/dbs_new_tobe")
	if err != nil {
		log.Fatal(err)
	}
	defer db.Close()

	e := echo.New()
	e.Use(middleware.CORS())
	e.Use(middleware.CORSWithConfig(middleware.CORSConfig{
		AllowOrigins: []string{"http://127.0.0.1:8000", "http://localhost:8000"}, // Ganti dengan origin Anda
		AllowMethods: []string{http.MethodGet, http.MethodPost, http.MethodPut, http.MethodDelete},
	}))

	e.Use(middleware.Logger())
	e.Use(middleware.Recover())
	e.Static("/", "C:/laragon/www/api_tobe_store/barang")
	
	e.GET("/", func(c echo.Context) error {
		return c.String(http.StatusOK, "Hello, Service API!")
	})

	// // Barang CRUD
	e.GET("/barang", func(c echo.Context) error {
		rows, err := db.Query("SELECT id, kd_barang, nama_b, deskripsi, stok_b, harga_b, gambar_product FROM barang")
		if err != nil {
			log.Fatalf("Error saat mengambil data dari database: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
		defer rows.Close()
		var barangs []Barang
		for rows.Next() {
			var barang Barang
			err := rows.Scan(&barang.ID, &barang.Kd_barang, &barang.Nama_b, &barang.Deskripsi, &barang.Stok_b, &barang.Harga_b, &barang.Gambar_p)
			if err != nil {
				log.Fatalf("Error saat memindai baris data: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			barangs = append(barangs, barang)
		}
		if err := rows.Err(); err != nil {
			log.Fatalf("Error saat iterasi baris data: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
		return c.JSON(http.StatusOK, barangs)
	})

	//get gambar di url
	// Route to serve images
	e.GET("/images/:filename", func(c echo.Context) error {
		filename := c.Param("filename")
		imagePath := filepath.Join("./images", filename)

		// Check if file exists
		if _, err := os.Stat(imagePath); err == nil {
			// Serve the file
			return c.File(imagePath)
		} else {
			// Return 404 if file not found
			return c.String(http.StatusNotFound, "File not found")
		}
	})

	// Route to open image URL in browser
	e.GET("/open-image/:filename", func(c echo.Context) error {
		filename := c.Param("filename")
		imageURL := fmt.Sprintf("http://localhost:1323/images/%s", filename)

		// Open URL in browser
		if err := openURL(imageURL); err != nil {
			return c.String(http.StatusInternalServerError, fmt.Sprintf("Failed to open URL: %v", err))
		}

		return c.String(http.StatusOK, fmt.Sprintf("Opened image URL: %s", imageURL))
	})

	// PENCARIAN BARANG OLEH USER (PAI)
	// PENCARIAN BARANG BERDASARKAN NAMA BARANG

	e.GET("/total-stok", func(c echo.Context) error {
        var totalStok TotalStok
        err := db.QueryRow("SELECT SUM(stok_b) AS total_stok FROM barang").Scan(&totalStok.Total)
        if err != nil {
            return c.JSON(http.StatusInternalServerError, map[string]string{"error": err.Error()})
        }

        return c.JSON(http.StatusOK, totalStok)
    })

	e.GET("/Total_Transaksi", func(c echo.Context) error {
        var totalBarang TotalBarang
        err := db.QueryRow("SELECT SUM(jumlah_barang) AS total_barang FROM transaksi").Scan(&totalBarang.Total)
        if err != nil {
            return c.JSON(http.StatusInternalServerError, map[string]string{"error": err.Error()})
        }

        return c.JSON(http.StatusOK, totalBarang)
    })

	e.POST("/barang", func(c echo.Context) error {
		var barang Barang
		barang.Kd_barang = generateKodeBarang()
		barang.Nama_b = c.FormValue("nama_b")
		barang.Deskripsi = c.FormValue("deskripsi")
		barang.Stok_b, _ = strconv.Atoi(c.FormValue("stok_b"))
		barang.Harga_b, _ = strconv.ParseFloat(c.FormValue("harga_b"), 64)

		// Proses upload file gambar_product
		file, err := c.FormFile("gambar_product")
		if err != nil && err != http.ErrMissingFile {
			log.Printf("Error receiving file: %v", err)
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Bad Request"})
		}

		if file != nil {
			src, err := file.Open()
			if err != nil {
				log.Printf("Error opening file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			defer src.Close()

			filePath := fmt.Sprintf("images/%s", file.Filename)
			dst, err := os.Create(filePath)
			if err != nil {
				log.Printf("Error creating file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			defer dst.Close()
			if _, err = io.Copy(dst, src); err != nil {
				log.Printf("Error saving file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			barang.Gambar_p = file.Filename
		}

		sqlStatement := "INSERT INTO barang (kd_barang, nama_b, deskripsi, stok_b, harga_b, gambar_product) VALUES (?, ?, ?, ?, ?, ?)"
		_, err = db.Exec(sqlStatement, barang.Kd_barang, barang.Nama_b, barang.Deskripsi, barang.Stok_b, barang.Harga_b, barang.Gambar_p)
		if err != nil {
			log.Printf("Error inserting into database: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}

		return c.JSON(http.StatusCreated, barang)
	})


	e.GET("/barang/:nama_b", func(c echo.Context) error {
		nama_b, err := url.PathUnescape(c.Param("nama_b"))
		if err != nil {
			log.Fatalf("Error decoding URL parameter: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
		
		row := db.QueryRow("SELECT id, kd_barang, nama_b, deskripsi, stok_b, harga_b, gambar_product FROM barang WHERE nama_b = ?", nama_b)
	
		var barang Barang
		err = row.Scan(&barang.ID, &barang.Kd_barang, &barang.Nama_b, &barang.Deskripsi, &barang.Stok_b, &barang.Harga_b, &barang.Gambar_p)
		if err == sql.ErrNoRows {
			return c.JSON(http.StatusNotFound, map[string]string{"message": "Barang not found"})
		} else if err != nil {
			log.Fatalf("Error saat memindai baris data: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
	
		return c.JSON(http.StatusOK, barang)
	})
	
	e.GET("/barang/:kd_barang", func(c echo.Context) error {
		kd_barang := c.Param("kd_barang")
		
		row := db.QueryRow("SELECT id, kd_barang, nama_b, deskripsi, stok_b, harga_b, gambar_product FROM barang WHERE kd_barang = ?", kd_barang)

		var barang Barang
		err := row.Scan(&barang.ID, &barang.Kd_barang, &barang.Nama_b, &barang.Deskripsi, &barang.Stok_b, &barang.Harga_b, &barang.Gambar_p)
		if err == sql.ErrNoRows {
			return c.JSON(http.StatusNotFound, map[string]string{"message": "Barang not found"})
		} else if err != nil {
			log.Fatalf("Error saat memindai baris data: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}

		return c.JSON(http.StatusOK, barang)
	})

    // Endpoint PUT Barang berdasarkan kd_barang
	e.PUT("/barang/:kd_barang", func(c echo.Context) error {
		kd_barang := c.Param("kd_barang")
		var barang Barang
	
		if err := c.Bind(&barang); err != nil {
			return c.JSON(http.StatusBadRequest, map[string]string{"error": err.Error()})
		}
	
		query := "UPDATE barang SET nama_b = ?, deskripsi = ?, stok_b = ?, harga_b = ? WHERE kd_barang = ?"
		res, err := db.Exec(query, barang.Nama_b, barang.Deskripsi, barang.Stok_b, barang.Harga_b, kd_barang)
		if err != nil {
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": err.Error()})
		}
	
		rowsAffected, err := res.RowsAffected()
		if err != nil {
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": err.Error()})
		}
		if rowsAffected == 0 {
			return c.JSON(http.StatusNotFound, map[string]string{"error": "Barang not found"})
		}
	
		return c.JSON(http.StatusOK, map[string]string{"message": "Barang updated successfully"})
	})
	

	e.DELETE("/barang/:kd_barang", func(c echo.Context) error {
		kd_barang := c.Param("kd_barang")

		sqlStatement := "DELETE FROM barang WHERE kd_barang=?"
		_, err := db.Exec(sqlStatement, kd_barang)
		if err != nil {
			log.Fatal(err)
		}

		return c.NoContent(http.StatusNoContent)
	})
	
	e.GET("/users", func(c echo.Context) error {
		res, err := db.Query("SELECT id, kd_user, nama_users, email, username, pass, no_wa, alamat, nik, tgl_lahir, foto_profile FROM users")
		if err != nil {
			log.Printf("Error saat mengambil data dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
		defer res.Close()
	
		var users []Users
		for res.Next() {
			var u Users
			var tgl_lahir sql.NullString 
			err := res.Scan(&u.ID, &u.Kd_user, &u.Nama_users, &u.Email, &u.Username, &u.Pass, &u.No_wa, &u.Alamat, &u.Nik, &tgl_lahir, &u.Foto_profile)
			if err != nil {
				log.Printf("Error saat memindai baris data: %v", err)
				continue
			}
			if tgl_lahir.Valid {
				u.Tgl_lahir, err = time.Parse("2006-01-02", tgl_lahir.String)
				if err != nil {
					log.Printf("Error saat parsing tgl_lahir: %v", err)
					continue
				}
			}
	
			users = append(users, u)
		}
	
		if err := res.Err(); err != nil {
			log.Printf("Error saat iterasi baris data user: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
	
		return c.JSON(http.StatusOK, users)
	})
		

	//LOGIN USER (PAI)
	e.POST("/login", func(c echo.Context) error {
		email := c.FormValue("email")
		password := c.FormValue("password")
	
		var kd_user string
		err := db.QueryRow("SELECT kd_user FROM users WHERE email = ? AND pass = ?", email, password).Scan(&kd_user)
		if err != nil {
			log.Printf("Error querying database: %v\n", err)
			return c.JSON(http.StatusUnauthorized, map[string]string{"error": "Invalid credentials"})
		}

		c.Response().Header().Set("kd_user", kd_user)
	
		user := map[string]string{
			"kd_user": kd_user,
			"email": email,
		}
		return c.JSON(http.StatusOK, user)
	})

	// Endpoint untuk mendapatkan data pengguna berdasarkan kd_user setelah login
// Endpoint untuk mendapatkan data pengguna berdasarkan kd_user setelah login
e.GET("/users/:kd_user", func(c echo.Context) error {
    kd_user := c.Param("kd_user")

    // Query untuk mengambil semua informasi pengguna berdasarkan kd_user
    query := `
        SELECT nama_users, email, username, no_wa, alamat, nik, tgl_lahir, foto_profile
        FROM users
        WHERE kd_user = ?
    `

    var (
        nama_users   string
        email        string
        username     string
        no_wa        int64
        alamat       string
        nik          int64
        tgl_lahirStr string // Temporary variable to hold the date string
        foto_profile string
    )

    err := db.QueryRow(query, kd_user).Scan(
        &nama_users,
        &email,
        &username,
        &no_wa,
        &alamat,
        &nik,
        &tgl_lahirStr,
        &foto_profile,
    )
    if err != nil {
        log.Printf("Error querying database: %v\n", err)
        return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Failed to fetch user data"})
    }

    // Parse tgl_lahirStr into time.Time
    tgl_lahir, err := time.Parse("2006-01-02", tgl_lahirStr)
    if err != nil {
        log.Printf("Error parsing tgl_lahir: %v\n", err)
        return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Failed to parse tgl_lahir"})
    }

    user := Users{
        Nama_users:   nama_users,
        Email:        email,
        Username:     username,
        No_wa:        no_wa,
        Alamat:       alamat,
        Nik:          nik,
        Tgl_lahir:    tgl_lahir,
        Foto_profile: foto_profile,
    }

    return c.JSON(http.StatusOK, user)
})
	
	e.PUT("/users/:kd_user", func(c echo.Context) error {
		var user Users
		kd_user := c.Param("kd_user")
		user.Nama_users = c.FormValue("nama_users")
		user.Email = c.FormValue("email")
		user.Username = c.FormValue("username")
		user.Pass = c.FormValue("pass")
		user.No_wa, _ = strconv.ParseInt(c.FormValue("no_wa"), 10, 64)
		user.Alamat = c.FormValue("alamat")
		user.Nik, _ = strconv.ParseInt(c.FormValue("nik"), 10, 64)
		tgl_lahir, err := time.Parse("2006-01-02", c.FormValue("tgl_lahir"))
		if err != nil {
			log.Printf("Error parsing tgl_lahir: %v", err)
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Invalid date format"})
		}
		user.Tgl_lahir = tgl_lahir
	
		file, err := c.FormFile("foto_profile")
		if err != nil && err != http.ErrMissingFile {
			log.Printf("Error receiving file: %v", err)
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Bad Request"})
		}
	
		if file != nil {
			src, err := file.Open()
			if err != nil {
				log.Printf("Error opening file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			defer src.Close()
	
			// Simpan file di server
			filePath := fmt.Sprintf("foto_profile/%s", file.Filename)
			dst, err := os.Create(filePath)
			if err != nil {
				log.Printf("Error creating file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			defer dst.Close()
			if _, err = io.Copy(dst, src); err != nil {
				log.Printf("Error saving file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			user.Foto_profile = file.Filename
		}
	
		sqlStatement := `
			UPDATE users
			SET nama_users = ?, email = ?, username = ?, pass = ?, no_wa = ?, alamat = ?, nik = ?, tgl_lahir = ?, foto_profile = ?
			WHERE kd_user = ?`
		_, err = db.Exec(sqlStatement, user.Nama_users, user.Email, user.Username, user.Pass, user.No_wa, user.Alamat, user.Nik, user.Tgl_lahir, user.Foto_profile, kd_user)
		if err != nil {
			log.Printf("Error updating database: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
	
		return c.JSON(http.StatusOK, user)
	})
	
	e.POST("/register_users", func(c echo.Context) error {
		var user Users
		user.Kd_user = generateKodeUser()
		user.Nama_users = c.FormValue("nama_users")
		user.Email = c.FormValue("email")
		user.Username = c.FormValue("username")
		user.Pass = c.FormValue("pass")
		user.No_wa, _ = strconv.ParseInt(c.FormValue("no_wa"), 10, 64)
		user.Alamat = c.FormValue("alamat")
		user.Nik, _ = strconv.ParseInt(c.FormValue("nik"), 10, 64)
		tgl_lahir, err := time.Parse("2006-01-02", c.FormValue("tgl_lahir"))
		if err != nil {
			log.Printf("Error parsing tgl_lahir: %v", err)
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Invalid date format"})
		}
		user.Tgl_lahir = tgl_lahir
	
		file, err := c.FormFile("foto_profile")
		if err != nil && err != http.ErrMissingFile {
			log.Printf("Error receiving file: %v", err)
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Bad Request"})
		}
	
		if file != nil {
			src, err := file.Open()
			if err != nil {
				log.Printf("Error opening file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			defer src.Close()
	
			filePath := fmt.Sprintf("foto_profile/%s", file.Filename)
			dst, err := os.Create(filePath)
			if err != nil {
				log.Printf("Error creating file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			defer dst.Close()
			if _, err = io.Copy(dst, src); err != nil {
				log.Printf("Error saving file: %v", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
			}
			user.Foto_profile = file.Filename
		}
	
		sqlStatement := "INSERT INTO users (kd_user, nama_users, email, username, pass, no_wa, alamat, nik, tgl_lahir, foto_profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
		_, err = db.Exec(sqlStatement, user.Kd_user, user.Nama_users, user.Email, user.Username, user.Pass, user.No_wa, user.Alamat, user.Nik, user.Tgl_lahir, user.Foto_profile)
		if err != nil {
			log.Printf("Error inserting into database: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
	
		return c.JSON(http.StatusCreated, user)
	})

	// LOGIN SELLER (SHA)
	// GET all sellers
e.GET("/sellers", func(c echo.Context) error {
    rows, err := db.Query("SELECT id, kd_seller, nama_seller, email, username, pass, no_wa, alamat, nik, tgl_lahir, foto_profile FROM seller")
    if err != nil {
        log.Fatalf("Error querying sellers: %v", err)
        return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
    }
    defer rows.Close()

    var sellers []Seller
    for rows.Next() {
        var seller Seller
        err := rows.Scan(&seller.ID, &seller.Kd_seller, &seller.Nama_Seller, &seller.Email, &seller.Username, &seller.Pass, &seller.No_wa, &seller.Alamat, &seller.Nik, &seller.Tgl_lahir, &seller.Foto_profile)
        if err != nil {
            log.Fatalf("Error scanning seller row: %v", err)
            return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
        }
        sellers = append(sellers, seller)
    }
    if err := rows.Err(); err != nil {
        log.Fatalf("Error iterating over seller rows: %v", err)
        return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
    }

    return c.JSON(http.StatusOK, sellers)
})

// e.GET("/seller_pai", func(c echo.Context) error {
// 	// Query ke database
// 	rows, err := db.Query("SELECT id, kd_seller, nama_seller, email, username, no_wa, alamat, nik, DATE_FORMAT(tgl_lahir, '%Y-%m-%d') as tgl_lahir, foto_profile FROM seller")
// 	if err != nil {
// 		return err
// 	}
// 	defer rows.Close()

// 	// Array untuk menyimpan data seller
// 	var sellers []Seller

// 	// Loop through rows
// 	for rows.Next() {
// 		var seller Seller
// 		err := rows.Scan(&seller.ID, &seller.Kd_seller, &seller.Nama_Seller, &seller.Email, &seller.Username, &seller.No_wa, &seller.Alamat, &seller.Nik, &seller.Tgl_lahir, &seller.Foto_profile)
// 		if err != nil {
// 			return err
// 		}
// 		sellers = append(sellers, seller)
// 	}

// 	// Return response JSON
// 	return c.JSON(http.StatusOK, sellers)
// })

e.GET("/seller/:kd_seller", func(c echo.Context) error {
	kd_seller := c.Param("kd_seller")
	
	// Query to the database
	row := db.QueryRow("SELECT id, kd_seller, nama_seller, email, username, no_wa, alamat, nik, DATE_FORMAT(tgl_lahir, '%Y-%m-%d') as tgl_lahir, foto_profile FROM seller WHERE kd_seller = ?", kd_seller)

	var seller Seller
	err := row.Scan(&seller.ID, &seller.Kd_seller, &seller.Nama_Seller, &seller.Email, &seller.Username, &seller.No_wa, &seller.Alamat, &seller.Nik, &seller.Tgl_lahir, &seller.Foto_profile)
	if err == sql.ErrNoRows {
		return c.JSON(http.StatusNotFound, echo.Map{"message": "Seller not found"})
	} else if err != nil {
		return err
	}

	// Return response JSON
	return c.JSON(http.StatusOK, seller)
})

	e.POST("/login_seller", func(c echo.Context) error {
		username := c.FormValue("username")
		password := c.FormValue("password")

		var dbUsername, dbPassword string
		err := db.QueryRow("SELECT username, pass FROM seller WHERE username = ?", username).Scan(&dbUsername, &dbPassword)
		if err != nil {
			log.Printf("Error querying database: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}

		// Bandingkan password dari database dengan password yang dimasukkan
		if username == dbUsername && password == dbPassword {
			return c.JSON(http.StatusOK, map[string]string{"message": "Login successful"})
		} else {
			return c.JSON(http.StatusUnauthorized, map[string]string{"error": "Invalid username or password"})
		}
	})

	e.POST("/sellers", func(c echo.Context) error {
		var seller Seller
		seller.Kd_seller = generateKodeSeller()
		seller.Nama_Seller = c.FormValue("nama_seller")
		seller.Email = c.FormValue("email")
		seller.Username = c.FormValue("username")
		seller.Pass = c.FormValue("pass")
		seller.No_wa, _ = strconv.ParseInt(c.FormValue("no_wa"), 10, 64)
		seller.Alamat = c.FormValue("alamat")
	
		sqlStatement := "INSERT INTO seller (kd_seller, nama_seller, email, username, pass, no_wa, alamat) VALUES (?, ?, ?, ?, ?, ?, ?)"
		_, err := db.Exec(sqlStatement, seller.Kd_seller, seller.Nama_Seller, seller.Email, seller.Username, seller.Pass, seller.No_wa, seller.Alamat)
		if err != nil {
			log.Printf("Error inserting into database: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
	
		return c.JSON(http.StatusCreated, seller)
	})
	

	e.PUT("/update/:kd_seller", func(c echo.Context) error {
		kdSeller := c.Param("kd_seller")
	
		namaSeller := c.FormValue("nama_seller")
		email := c.FormValue("email")
		username := c.FormValue("username")
		password := c.FormValue("password")
		noWA := c.FormValue("no_wa")
		alamat := c.FormValue("alamat")
		nik := c.FormValue("nik")
		tglLahir := c.FormValue("tgl_lahir")
	
		// Konversi noWA ke integer
		noWANum, err := strconv.Atoi(noWA)
		if err != nil {
			log.Printf("Error converting no_wa to integer: %v", err)
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Invalid no_wa format"})
		}
	
		// Update data seller di database
		_, err = db.Exec("UPDATE seller SET nama_seller=?, email=?, username=?, pass=?, no_wa=?, alamat=?, nik=?, tgl_lahir=? WHERE kd_seller=?",
			namaSeller, email, username, password, noWANum, alamat, nik, tglLahir, kdSeller)
		if err != nil {
			log.Printf("Error updating seller data: %v", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Failed to update seller data"})
		}
	
		return c.JSON(http.StatusOK, map[string]string{"message": "Seller updated successfully", "kd_seller": kdSeller})
	})
	
	//LOGIN
	// Handler untuk menampilkan form login
	e.GET("/login", func(c echo.Context) error {
		return c.File("users/login.html")
	})

	e.DELETE("/users/:kd_user", func(c echo.Context) error {
		kd_user := c.Param("kd_user")

		sqlStatement := "DELETE FROM users WHERE kd_user = ?"
		result, err := db.Exec(sqlStatement, kd_user)
		if err != nil {
			log.Printf("Error deleting user with kd_user %s: %v", kd_user, err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}
		rowsAffected, err := result.RowsAffected()
		if err != nil {
			log.Printf("Error checking rows affected after deleting user with kd_user %s: %v", kd_user, err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Internal Server Error"})
		}

		if rowsAffected == 0 {
			return c.JSON(http.StatusNotFound, map[string]string{"error": "User not found"})
		}

		return c.JSON(http.StatusOK, map[string]string{"message": "User deleted successfully"})
	})
	// Transaksi

	e.GET("/pengiriman_arya_dua", func(c echo.Context) error {
		// Query to get pengiriman with status 'Proses'
		query := `
			SELECT
				p.kd_pengiriman,
				p.nama_kurir,
				p.kd_user,
				p.alamat_tujuan,
				p.kd_transaksi,
				p.kd_seller,
				p.status_pengiriman
			FROM
				pengiriman p
			WHERE
				p.status_pengiriman = 'Proses'
		`

		rows, err := db.Query(query)
		if err != nil {
			return err
		}
		defer rows.Close()

		var pengirimen []Pengiriman
		for rows.Next() {
			var pengiriman Pengiriman

			err := rows.Scan(&pengiriman.Kd_pengiriman, &pengiriman.Nama_kurir, &pengiriman.Kd_user, &pengiriman.Alamat_tujuan, &pengiriman.Kd_transaksi, &pengiriman.Kd_seller, &pengiriman.Status_pengiriman)
			if err != nil {
				return err
			}

			// Append each pengiriman to the slice
			pengirimen = append(pengirimen, pengiriman)
		}
		if err := rows.Err(); err != nil {
			return err
		}

		return c.JSON(http.StatusOK, pengirimen)
	})

	e.GET("/pengiriman_by_id", func(c echo.Context) error {
		// Get the transaction code from the query parameters
		kdPengiriman := c.QueryParam("kd_pengiriman")

		if kdPengiriman == "" {
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "kd_pengiriman is required"})
		}

		// Query to get the specific delivery by kd_pengiriman and status_pengiriman is 'Perjalanan'
		query := `
			SELECT
				p.kd_pengiriman,
				p.nama_kurir,
				p.kd_user,
				p.alamat_tujuan,
				p.kd_transaksi,
				p.kd_seller,
				p.status_pengiriman
			FROM
				pengiriman p
			WHERE
				p.kd_pengiriman = ? AND p.status_pengiriman = 'Proses'
		`

		var pengiriman Pengiriman

		err = db.QueryRow(query, kdPengiriman).Scan(&pengiriman.Kd_pengiriman, &pengiriman.Nama_kurir, &pengiriman.Kd_user, &pengiriman.Alamat_tujuan, &pengiriman.Kd_transaksi, &pengiriman.Kd_seller, &pengiriman.Status_pengiriman)
		if err != nil {
			if err == sql.ErrNoRows {
				return c.JSON(http.StatusNotFound, map[string]string{"error": "Delivery not found"})
			}
			return err
		}

		return c.JSON(http.StatusOK, pengiriman)
	})

	e.PUT("/pengiriman_arya_dua/:kd_pengiriman", func(c echo.Context) error {
		// Get the kd_pengiriman from the URL parameter
		kdPengiriman := c.Param("kd_pengiriman")

		// Query to update status_pengiriman to 'Perjalanan'
		query := `
			UPDATE
				pengiriman
			SET
				status_pengiriman = 'Perjalanan'
			WHERE
				kd_pengiriman = ?
		`

		// Execute the query
		_, err := db.Exec(query, kdPengiriman)
		if err != nil {
			return err
		}

		// Return a success response
		return c.JSON(http.StatusOK, map[string]string{"message": "Status pengiriman updated to Perjalanan"})
	})

	e.GET("/transaksi_arya_dua", func(c echo.Context) error {
		// Query database to get transactions with join
		query := `
			SELECT
				t.kd_transaksi,
				u.nama_users,
				s.nama_seller,
				b.nama_b,
				t.jumlah_barang,
				t.total_harga,
				t.tgl_transaksi,
				t.status_pembayaran,
				t.metode_pembayaran
			FROM
				transaksi t
			JOIN
				users u ON t.kd_user = u.kd_user
			JOIN
				seller s ON t.kd_seller = s.kd_seller
			JOIN
				barang b ON t.kd_barang = b.kd_barang
			WHERE
				t.status_pembayaran = 'Pending'
		`
		rows, err := db.Query(query)
		if err != nil {
			return err
		}
		defer rows.Close()

		var transaksis []Transaksip
		for rows.Next() {
			var transaksi Transaksip
			var tglTransaksi string // Variabel sementara untuk tgl_transaksi

			err := rows.Scan(&transaksi.Kd_transaksi, &transaksi.Nama_users, &transaksi.Nama_seller, &transaksi.Nama_barang, &transaksi.Jumlah_barang, &transaksi.Total_harga, &tglTransaksi, &transaksi.Status_pembayaran, &transaksi.Metode_pembayaran)
			if err != nil {
				return err
			}

			// Konversi tgl_transaksi ke time.Time setelah pemindaian
			transaksi.Tgl_transaksi, _ = time.Parse("2006-01-02 15:04:05", tglTransaksi)

			// Append each transaction to the slice
			transaksis = append(transaksis, transaksi)
		}
		if err := rows.Err(); err != nil {
			return err
		}

		return c.JSON(http.StatusOK, transaksis)
	})

	// Endpoint PUT untuk mengubah status pembayaran transaksi berdasarkan kd_transaksi
	e.PUT("/update_transaksi_arya/:kd_transaksi", func(c echo.Context) error {
		kdTransaksi := c.Param("kd_transaksi")

		// Update status pembayaran menjadi 'Sukses' di database
		updateQuery := `
			UPDATE transaksi
			SET status_pembayaran = 'Sukses'
			WHERE kd_transaksi = ?
		`

		result, err := db.Exec(updateQuery, kdTransaksi)
		if err != nil {
			return echo.NewHTTPError(http.StatusInternalServerError, fmt.Sprintf("Error updating transaction: %s", err))
		}

		// Periksa jumlah baris yang terpengaruh
		rowsAffected, err := result.RowsAffected()
		if err != nil {
			return echo.NewHTTPError(http.StatusInternalServerError, fmt.Sprintf("Error checking rows affected: %s", err))
		}

		// Jika tidak ada transaksi yang ditemukan, kembalikan error Not Found
		if rowsAffected == 0 {
			return echo.NewHTTPError(http.StatusNotFound, "Transaksi not found")
		}

		// Jika berhasil, kembalikan respons JSON
		return c.JSON(http.StatusOK, map[string]string{"message": "Transaksi updated successfully"})
	})

	e.GET("/transaksi_by_id", func(c echo.Context) error {
		// Get the transaction code from the query parameters
		kdTransaksi := c.QueryParam("kd_transaksi")

		if kdTransaksi == "" {
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "kd_transaksi is required"})
		}

		// Query to get the specific transaction by kd_transaksi and status_pembayaran is 'Pending'
		query := `
			SELECT
				t.kd_transaksi,
				u.nama_users,
				s.nama_seller,
				b.nama_b,
				t.jumlah_barang,
				t.total_harga,
				t.tgl_transaksi,
				t.status_pembayaran,
				t.metode_pembayaran,
				t.batas_pembayaran
			FROM
				transaksi t
			JOIN
				users u ON t.kd_user = u.kd_user
			JOIN
				seller s ON t.kd_seller = s.kd_seller
			JOIN
				barang b ON t.kd_barang = b.kd_barang
			WHERE
				t.kd_transaksi = ? AND t.status_pembayaran = 'Pending'
		`

		var transaksi Transaksip
		var tglTransaksi string // Temporary variable for tgl_transaksi

		err := db.QueryRow(query, kdTransaksi).Scan(&transaksi.Kd_transaksi, &transaksi.Nama_users, &transaksi.Nama_seller, &transaksi.Nama_barang, &transaksi.Jumlah_barang, &transaksi.Total_harga, &tglTransaksi, &transaksi.Status_pembayaran, &transaksi.Metode_pembayaran, &transaksi.Batas_pembayaran)
		if err != nil {
			if err == sql.ErrNoRows {
				return c.JSON(http.StatusNotFound, map[string]string{"error": "Transaction not found"})
			}
			return err
		}

		// Convert tgl_transaksi to time.Time
		transaksi.Tgl_transaksi, _ = time.Parse("2006-01-02 15:04:05", tglTransaksi)

		return c.JSON(http.StatusOK, transaksi)
	})

	// Endpoint untuk mendapatkan semua transaksi
	e.GET("/transaksi", func(c echo.Context) error {
		// Query untuk mendapatkan semua data transaksi
		rows, err := db.Query("SELECT id, kd_user, kd_seller, kd_transaksi, kd_barang, jumlah_barang, total_harga, tgl_transaksi, status_pembayaran FROM transaksi")
		if err != nil {
			log.Printf("Kesalahan saat mengambil semua transaksi dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil semua transaksi"})
		}
		defer rows.Close()
	
		var transaksiList []Transaksi
		for rows.Next() {
			var t Transaksi
			var tgl_transaksi string
			if err := rows.Scan(&t.ID, &t.Kd_user, &t.Kd_seller, &t.Kd_transaksi, &t.Kd_barang, &t.Jumlah_barang, &t.Total_harga, &tgl_transaksi, &t.Status_pembayaran); err != nil {
				log.Printf("Kesalahan saat memindai transaksi dari database: %v\n", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil semua transaksi"})
			}
	
			// Parse nilai tgl_transaksi ke time.Time
			t.Tgl_transaksi, err = time.Parse("2006-01-02 15:04:05", tgl_transaksi)
			if err != nil {
				log.Printf("Kesalahan parsing tgl_transaksi: %v\n", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil semua transaksi"})
			}
	
			transaksiList = append(transaksiList, t)
		}
	
		if err := rows.Err(); err != nil {
			log.Printf("Kesalahan saat iterasi transaksi dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil semua transaksi"})
		}
	
		return c.JSON(http.StatusOK, transaksiList)
	})

	e.GET("/kd_trans_arya", func(c echo.Context) error {
		// Query ke database
		rows, err := db.Query("SELECT kd_transaksi FROM transaksi")
		if err != nil {
			log.Fatal(err)
		}
		defer rows.Close()

		var kdTransaksis []string

		// Loop untuk memasukkan hasil query ke dalam slice kdTransaksis
		for rows.Next() {
			var kdTransaksi string
			if err := rows.Scan(&kdTransaksi); err != nil {
				log.Fatal(err)
			}
			kdTransaksis = append(kdTransaksis, kdTransaksi)
		}

		// Mengembalikan response JSON
		return c.JSON(http.StatusOK, kdTransaksis)
	})


	e.GET("/transaksii_arya", func(c echo.Context) error {
		// Query database to get transactions with status_pembayaran = 'Pending'
		rows, err := db.Query("SELECT id, kd_user, kd_seller, kd_transaksi, kd_barang, jumlah_barang, total_harga, tgl_transaksi, status_pembayaran FROM transaksi WHERE status_pembayaran = 'Pending'")
		if err != nil {
			return err
		}
		defer rows.Close()

		var transaksis []Transaksi
		for rows.Next() {
			var transaksi Transaksi
			var tglTransaksi string // Variabel sementara untuk tgl_transaksi

			err := rows.Scan(&transaksi.ID, &transaksi.Kd_user, &transaksi.Kd_seller, &transaksi.Kd_transaksi, &transaksi.Kd_barang, &transaksi.Jumlah_barang, &transaksi.Total_harga, &tglTransaksi, &transaksi.Status_pembayaran)
			if err != nil {
				return err
			}

			// Konversi tgl_transaksi ke time.Time setelah pemindaian
			transaksi.Tgl_transaksi, _ = time.Parse("2006-01-02 15:04:05", tglTransaksi)

			// Set metode_pembayaran secara otomatis
			transaksi.Metode_pembayaran = "Alfamart"

			// Append each transaction to the slice
			transaksis = append(transaksis, transaksi)
		}
		if err := rows.Err(); err != nil {
			return err
		}

		return c.JSON(http.StatusOK, transaksis)
	})

	e.GET("/transaksii_sha", func(c echo.Context) error {
		// Query database to get all transactions without filtering status_pembayaran
		query := `
			SELECT
				t.kd_transaksi,
				u.nama_users,
				s.nama_seller,
				b.nama_b,
				t.jumlah_barang,
				t.total_harga,
				t.tgl_transaksi,
				t.status_pembayaran,
				t.metode_pembayaran
			FROM
				transaksi t
			JOIN
				users u ON t.kd_user = u.kd_user
			JOIN
				seller s ON t.kd_seller = s.kd_seller
			JOIN
				barang b ON t.kd_barang = b.kd_barang
		`
		rows, err := db.Query(query)
		if err != nil {
			return err
		}
		defer rows.Close()

		var transaksis []Transaksip
		for rows.Next() {
			var transaksi Transaksip
			var tglTransaksi string // Variabel sementara untuk tgl_transaksi

			err := rows.Scan(&transaksi.Kd_transaksi, &transaksi.Nama_users, &transaksi.Nama_seller, &transaksi.Nama_barang, &transaksi.Jumlah_barang, &transaksi.Total_harga, &tglTransaksi, &transaksi.Status_pembayaran, &transaksi.Metode_pembayaran)
			if err != nil {
				return err
			}

			// Konversi tgl_transaksi ke time.Time setelah pemindaian
			transaksi.Tgl_transaksi, _ = time.Parse("2006-01-02 15:04:05", tglTransaksi)

			// Append each transaction to the slice
			transaksis = append(transaksis, transaksi)
		}
		if err := rows.Err(); err != nil {
			return err
		}

		return c.JSON(http.StatusOK, transaksis)
	})
	e.GET("/transaksii", func(c echo.Context) error {
		// Query untuk mendapatkan data transaksi dengan join ke tabel users, seller, dan barang
		query := `
			SELECT
				t.kd_transaksi,
				u.nama_users,  -- menggunakan kolom nama_users dari tabel users
				s.nama_seller,
				b.nama_b,
				t.jumlah_barang,
				t.total_harga,
				t.tgl_transaksi,
				t.status_pembayaran
			FROM
				transaksi t
			JOIN
				users u ON t.kd_user = u.kd_user
			JOIN
				seller s ON t.kd_seller = s.kd_seller
			JOIN
				barang b ON t.kd_barang = b.kd_barang
		`
		
		rows, err := db.Query(query)
		if err != nil {
			log.Printf("Kesalahan saat mengambil semua transaksi dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil semua transaksi"})
		}
		defer rows.Close()
	
		var transaksiList []TransaksiResponse
		for rows.Next() {
			var t TransaksiResponse
			var tglTransaksi string
			if err := rows.Scan(&t.KdTransaksi, &t.NamaUser, &t.NamaSeller, &t.NamaBarang, &t.JumlahBarang, &t.TotalHarga, &tglTransaksi, &t.StatusPembayaran); err != nil {
				log.Printf("Kesalahan saat memindai transaksi dari database: %v\n", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil semua transaksi"})
			}
	
			// Parse nilai tgl_transaksi ke time.Time
			t.TglTransaksi, err = time.Parse("2006-01-02 15:04:05", tglTransaksi)
			if err != nil {
				log.Printf("Kesalahan parsing tgl_transaksi: %v\n", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil semua transaksi"})
			}
	
			transaksiList = append(transaksiList, t)
		}
	
		if err := rows.Err(); err != nil {
			log.Printf("Kesalahan saat iterasi transaksi dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil semua transaksi"})
		}
	
		return c.JSON(http.StatusOK, transaksiList)
	})
	
	e.GET("/transaksi/:kd_transaksi", func(c echo.Context) error {
		// Ambil parameter kd_transaksi dari URL
		kdTransaksi := c.Param("kd_transaksi")
		
		var t Transaksi
		query := "SELECT id, kd_user, kd_seller, kd_transaksi, kd_barang, jumlah_barang, total_harga, tgl_transaksi, status_pembayaran FROM transaksi WHERE kd_transaksi = ?"
		err := db.QueryRow(query, kdTransaksi).Scan(&t.ID, &t.Kd_user, &t.Kd_seller, &t.Kd_transaksi, &t.Kd_barang, &t.Jumlah_barang, &t.Total_harga, &t.Tgl_transaksi, &t.Status_pembayaran)
		if err != nil {
			if err == sql.ErrNoRows {
				return c.JSON(http.StatusNotFound, map[string]string{"error": "Transaksi tidak ditemukan"})
			}
			log.Printf("Kesalahan saat mengambil transaksi dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil transaksi"})
		}
	
		return c.JSON(http.StatusOK, t)
	})
	
	e.GET("/transaksi/:nama_users", func(c echo.Context) error {
        // Ambil parameter nama_users dari URL
        namaUsers := c.Param("nama_users")

        // Query untuk mengambil data transaksi berdasarkan nama_users
        rows, err := db.Query(`
            SELECT 
                transaksi.id,
                transaksi.kd_user,
                transaksi.kd_seller,
                transaksi.kd_transaksi,
                transaksi.kd_barang,
                transaksi.jumlah_barang,
                transaksi.total_harga,
                transaksi.tgl_transaksi,
                transaksi.status_pembayaran
            FROM 
                transaksi
            JOIN 
                users ON transaksi.kd_user = users.kd_user
            WHERE 
                users.nama_users = ?`, namaUsers)
        if err != nil {
            return err
        }
        defer rows.Close()

        var transaksis []Transaksi

        // Scan hasil query ke dalam slice transaksis
        for rows.Next() {
            var t Transaksi
            var tglTransaksi []uint8
            if err := rows.Scan(&t.ID, &t.Kd_user, &t.Kd_seller, &t.Kd_transaksi, &t.Kd_barang, &t.Jumlah_barang, &t.Total_harga, &tglTransaksi, &t.Status_pembayaran); err != nil {
                return err
            }

            // Konversi manual dari []uint8 ke time.Time
            t.Tgl_transaksi, err = time.Parse("2006-01-02 15:04:05", string(tglTransaksi))
            if err != nil {
                return err
            }

            transaksis = append(transaksis, t)
        }

        if err := rows.Err(); err != nil {
            return err
        }

        // Kembalikan data transaksi dalam format JSON
        return c.JSON(http.StatusOK, transaksis)
    })

	// Define route handler for updating transaksi
	e.PUT("/transaksi/:kd_transaksi", func(c echo.Context) error {
		// Ambil parameter kd_transaksi dari URL
		kdTransaksi := c.Param("kd_transaksi")

		// Bind hanya status pembayaran dari request body ke struct Transaksi
		var t struct {
			Status_pembayaran int `json:"status_pembayaran"`
		}
		if err := c.Bind(&t); err != nil {
			log.Printf("Gagal memparsing body request: %v\n", err)
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Gagal memparsing body request"})
		}

		// Validasi status pembayaran
		if t.Status_pembayaran != 0 && t.Status_pembayaran != 1 && t.Status_pembayaran != 3 {
			log.Printf("Status pembayaran tidak valid: %d\n", t.Status_pembayaran)
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Status pembayaran tidak valid"})
		}

		// Update status pembayaran di database
		query := `
        UPDATE transaksi 
        SET status_pembayaran = ? 
        WHERE kd_transaksi = ?`

		_, err := db.Exec(query, t.Status_pembayaran, kdTransaksi)
		if err != nil {
			log.Printf("Kesalahan saat update status pembayaran di database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengupdate status pembayaran"})
		}

		return c.JSON(http.StatusOK, map[string]string{"message": "Status pembayaran berhasil diupdate"})
	})

	e.POST("/transaksi", func(c echo.Context) error {
		type Transaksi struct {
			Kd_user           string `json:"kd_user"`
			Kd_seller         string `json:"kd_seller"`
			Kd_transaksi      string `json:"kd_transaksi"`
			Kd_barang         string `json:"kd_barang"`
			Jumlah_barang     int    `json:"jumlah_barang"`
			Metode_pembayaran string `json:"metode_pembayaran"`
		}
	
		var transaksi Transaksi
		if err := c.Bind(&transaksi); err != nil {
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "Invalid request"})
		}
	
		tgl_transaksi := time.Now()
		batas_pembayaran := tgl_transaksi.Add(24 * time.Hour)
	
		query := "INSERT INTO transaksi (kd_user, kd_seller, kd_transaksi, kd_barang, jumlah_barang, tgl_transaksi, status_pembayaran, metode_pembayaran, batas_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
		_, err := db.Exec(query, transaksi.Kd_user, transaksi.Kd_seller, transaksi.Kd_transaksi, transaksi.Kd_barang, transaksi.Jumlah_barang, tgl_transaksi, "Pending", transaksi.Metode_pembayaran, batas_pembayaran)
		if err != nil {
			log.Printf("Error inserting into database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Failed to create transaction"})
		}
	
		return c.JSON(http.StatusCreated, map[string]string{"message": "Transaction created successfully"})
	})
	
	// e.POST("/transaksii", func(c echo.Context) error {
	// 	type Transaksi struct {
	// 		Kd_user           string  `json:"kd_user"`
	// 		Kd_barang         string  `json:"kd_barang"`
	// 		Jumlah_barang     int     `json:"jumlah_barang"`
	// 		Total_harga       float64 `json:"total_harga"`
	// 		Metode_pembayaran string  `json:"metode_pembayaran"`
	// 	}
	
	// 	var transaksi Transaksi
	// 	if err := c.Bind(&transaksi); err != nil {
	// 		return c.JSON(http.StatusBadRequest, map[string]string{"error": "Invalid request"})
	// 	}
	
	// 	kd_seller := "S01020" // Nilai tetap
	// 	kd_transaksi := "TRX" + time.Now().Format("0601021504") // format dengan panjang 13 karakter (3 untuk TRX dan 10 untuk timestamp)
	// 	tgl_transaksi := time.Now()
	// 	batas_pembayaran := tgl_transaksi.Add(24 * time.Hour)
	// 	status_pembayaran := "Pending" // Nilai tetap
	
	// 	query := "INSERT INTO transaksi (kd_user, kd_seller, kd_transaksi, kd_barang, jumlah_barang, total_harga, tgl_transaksi, status_pembayaran, metode_pembayaran, batas_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
	// 	_, err := db.Exec(query, transaksi.Kd_user, kd_seller, kd_transaksi, transaksi.Kd_barang, transaksi.Jumlah_barang, transaksi.Total_harga, tgl_transaksi, status_pembayaran, transaksi.Metode_pembayaran, batas_pembayaran)
	// 	if err != nil {
	// 		log.Printf("Error inserting into database: %v\n", err)
	// 		return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Failed to create transaction"})
	// 	}
	
	// 	return c.JSON(http.StatusCreated, map[string]string{"message": "Transaction created successfully"})
	// })
	
	

	// Endpoint untuk menghapus transaksi berdasarkan ID
	e.DELETE("/transaksi/:id", func(c echo.Context) error {
		// Ambil parameter id dari URL
		idStr := c.Param("id")
		id, err := strconv.Atoi(idStr)
		if err != nil {
			return c.JSON(http.StatusBadRequest, map[string]string{"error": "ID transaksi tidak valid"})
		}

		// Hapus transaksi dari database
		query := "DELETE FROM transaksi WHERE id = ?"
		_, err = db.Exec(query, id)
		if err != nil {
			log.Printf("Kesalahan saat menghapus transaksi dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal menghapus transaksi"})
		}

		return c.JSON(http.StatusOK, map[string]string{"message": "Transaksi berhasil dihapus"})
	})

	e.GET("/penghasilan", func(c echo.Context) error {
		var totalHarga struct {
			Total float64 `json:"total_harga"`
		}
		err := db.QueryRow("SELECT SUM(total_harga) AS total_harga FROM transaksi WHERE status_pembayaran = 'Sukses'").Scan(&totalHarga.Total)
		if err != nil {
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": err.Error()})
		}
	
		return c.JSON(http.StatusOK, totalHarga)
	})

	// e.GET("/troli/:kd_user", func(c echo.Context) error {
	// 	kd_user := c.Param("kd_user")

	// 	rows, err := db.Query("SELECT id, kd_user, kd_seller, kd_barang, gambar_p, harga_b, jumlah_barang FROM troli WHERE kd_user = ?", kd_user)
	// 	if err != nil {
	// 		return err
	// 	}
	// 	defer rows.Close()

	// 	var trolis []Troli
	// 	for rows.Next() {
	// 		var troli Troli
	// 		if err := rows.Scan(&troli.ID, &troli.Kd_user, &troli.Kd_seller, &troli.Kd_barang, &troli.Gambar_p, &troli.Harga_b, &troli.Jumlah_barang); err != nil {
	// 			return err
	// 		}
	// 		trolis = append(trolis, troli)
	// 	}

	// 	if err := rows.Err(); err != nil {
	// 		return err
	// 	}

	// 	return c.JSON(http.StatusOK, trolis)
	// })

	e.GET("/troli/:kd_user", func(c echo.Context) error {
		kd_user := c.Param("kd_user")
	
		// Query SQL dengan join untuk mengambil data troli beserta nama_seller dan nama_b
		query := `
			SELECT t.id, t.kd_user, t.kd_seller, s.nama_seller, t.kd_barang, b.nama_b, t.gambar_p, t.harga_b, t.jumlah_barang
			FROM troli t
			LEFT JOIN seller s ON t.kd_seller = s.kd_seller
			LEFT JOIN barang b ON t.kd_barang = b.kd_barang
			WHERE t.kd_user = ?
		`
	
		// Eksekusi query dengan parameter kd_user
		rows, err := db.Query(query, kd_user)
		if err != nil {
			return err
		}
		defer rows.Close()
	
		var trolis []Troli
		for rows.Next() {
			var troli Troli
			// Scan data dari baris hasil query ke struct Troli
			if err := rows.Scan(&troli.ID, &troli.Kd_user, &troli.Kd_seller, &troli.Nama_seller, &troli.Kd_barang, &troli.Nama_b, &troli.Gambar_p, &troli.Harga_b, &troli.Jumlah_barang); err != nil {
				return err
			}
			// Tambahkan troli ke slice trolis
			trolis = append(trolis, troli)
		}
	
		// Handle error jika ada
		if err := rows.Err(); err != nil {
			return err
		}
	
		// Mengembalikan data trolis sebagai respons JSON
		return c.JSON(http.StatusOK, trolis)
	})
	

	e.GET("/trola", func(c echo.Context) error {
		// Query to join troli with users, seller, and barang tables
		query := `
			SELECT 
				t.id, t.kd_user, t.kd_seller, t.kd_barang, t.gambar_p, t.harga_b, t.jumlah_barang,
				u.nama_users as nama_seller,
				b.nama_b
			FROM 
				troli t
			INNER JOIN 
				users u ON t.kd_user = u.kd_user
			INNER JOIN 
				seller s ON t.kd_seller = s.kd_seller
			INNER JOIN 
				barang b ON t.kd_barang = b.kd_barang
		`

		rows, err := db.Query(query)
		if err != nil {
			log.Println(err.Error())
			return c.JSON(http.StatusInternalServerError, map[string]string{"message": "Failed to fetch troli data"})
		}
		defer rows.Close()

		var troliList []Troli
		for rows.Next() {
			var troli Troli
			err := rows.Scan(&troli.ID, &troli.Kd_user, &troli.Kd_seller, &troli.Kd_barang, &troli.Gambar_p, &troli.Harga_b, &troli.Jumlah_barang, &troli.Nama_seller, &troli.Nama_b)
			if err != nil {
				log.Println(err.Error())
				return c.JSON(http.StatusInternalServerError, map[string]string{"message": "Failed to fetch troli data"})
			}
			troliList = append(troliList, troli)
		}

		return c.JSON(http.StatusOK, troliList)
	})

	e.GET("/trolii", setUserContext(func(c echo.Context) error {
		// Mendapatkan kd_user dari context
		kd_user := c.Get("kd_user").(string)
	
		// Query untuk mengambil data troli
		query := "SELECT id, kd_seller, kd_barang, gambar_p, harga_b, jumlah_barang FROM troli WHERE kd_user = ?"
		rows, err := db.Query(query, kd_user)
		if err != nil {
			fmt.Println("Error querying data:", err.Error())
			return echo.NewHTTPError(http.StatusInternalServerError, "Gagal mengambil data")
		}
		defer rows.Close()
	
		// Slice untuk menyimpan data troli
		var troliData []Troli
		for rows.Next() {
			var troli Troli
			if err := rows.Scan(&troli.ID, &troli.Kd_seller, &troli.Kd_barang, &troli.Gambar_p, &troli.Harga_b, &troli.Jumlah_barang); err != nil {
				fmt.Println("Error scanning data:", err.Error())
				return echo.NewHTTPError(http.StatusInternalServerError, "Gagal memproses data")
			}
			troliData = append(troliData, troli)
		}
	
		return c.JSON(http.StatusOK, troliData)
	}))
	
	e.POST("/troli", func(c echo.Context) error {
		var troli Troli
		if err := c.Bind(&troli); err != nil {
			return echo.NewHTTPError(http.StatusBadRequest, "Input tidak valid")
		}
	
		// Mendapatkan kd_user dari context
		kd_user := c.Get("kd_user").(string)
		troli.Kd_user = kd_user
	
		query := "INSERT INTO troli (kd_user, kd_seller, kd_barang, gambar_p, harga_b, jumlah_barang) VALUES (?, ?, ?, ?, ?, ?)"
		result, err := db.Exec(query, troli.Kd_user, troli.Kd_seller, troli.Kd_barang, troli.Gambar_p, troli.Harga_b, troli.Jumlah_barang)
		if err != nil {
			fmt.Println("Error inserting data:", err.Error())
			return echo.NewHTTPError(http.StatusInternalServerError, "Gagal memasukkan data")
		}
	
		id, err := result.LastInsertId()
		if err != nil {
			return echo.NewHTTPError(http.StatusInternalServerError, "Gagal mendapatkan ID terakhir")
		}
		troli.ID = int(id)
	
		return c.JSON(http.StatusCreated, troli)
	}, setUserContext)
	
	e.PUT("/troli/:id", setUserContext(func(c echo.Context) error {
		id := c.Param("id")
	
		// Mendapatkan kd_user dari context
		kd_user := c.Get("kd_user").(string)
	
		// Bind hanya untuk jumlah_barang
		var input struct {
			Jumlah_barang int `json:"jumlah_barang"`
		}
		if err := c.Bind(&input); err != nil {
			return echo.NewHTTPError(http.StatusBadRequest, "Input tidak valid")
		}
	
		// Memperbarui jumlah_barang
		query := "UPDATE troli SET jumlah_barang = ? WHERE id = ? AND kd_user = ?"
		result, err := db.Exec(query, input.Jumlah_barang, id, kd_user)
		if err != nil {
			fmt.Println("Error updating data:", err.Error())
			return echo.NewHTTPError(http.StatusInternalServerError, "Gagal memperbarui data")
		}
	
		rowsAffected, err := result.RowsAffected()
		if err != nil {
			return echo.NewHTTPError(http.StatusInternalServerError, "Gagal mendapatkan jumlah baris yang terpengaruh")
		}
		if rowsAffected == 0 {
			return echo.NewHTTPError(http.StatusNotFound, "Tidak ada data yang diperbarui")
		}
	
		return c.JSON(http.StatusOK, map[string]interface{}{
			"id":             id,
			"kd_user":        kd_user,
			"jumlah_barang":  input.Jumlah_barang,
		})
	}))

	e.DELETE("/troli/:id", setUserContext(func(c echo.Context) error {
		id := c.Param("id")
		kd_user := c.Get("kd_user").(string)
		query := "DELETE FROM troli WHERE id = ? AND kd_user = ?"
		result, err := db.Exec(query, id, kd_user)
		if err != nil {
			fmt.Println("Error deleting data:", err.Error())
			return echo.NewHTTPError(http.StatusInternalServerError, "Gagal menghapus data")
		}
		rowsAffected, err := result.RowsAffected()
		if err != nil {
			return echo.NewHTTPError(http.StatusInternalServerError, "Gagal mendapatkan jumlah baris yang terpengaruh")
		}
		if rowsAffected == 0 {
			return echo.NewHTTPError(http.StatusNotFound, "Tidak ada data yang dihapus")
		}
		return c.JSON(http.StatusOK, map[string]interface{}{
			"message": "Data troli berhasil dihapus",
		})
	}))

	e.GET("/pengirimann", func(c echo.Context) error {
        rows, err := db.Query(`SELECT
            pengiriman.kd_pengiriman,
            pengiriman.kd_transaksi,
            pengiriman.nama_kurir,
            pengiriman.alamat_tujuan,
            pengiriman.status_pengiriman,
            pengiriman.ongkir,
            transaksi.kd_user,
            users.nama_users,
            seller.nama_seller
        FROM
            pengiriman
        JOIN
            transaksi ON pengiriman.kd_transaksi = transaksi.kd_transaksi
        JOIN
            users ON transaksi.kd_user = users.kd_user
        JOIN
            seller ON transaksi.kd_seller = seller.kd_seller`)
        if err != nil {
            return c.JSON(http.StatusInternalServerError, map[string]string{
                "message": "Query execution error",
                "error":   err.Error(),
            })
        }
        defer rows.Close()

        var results []Pengirimann
        for rows.Next() {
            var p Pengirimann
            if err := rows.Scan(&p.KdPengiriman, &p.KdTransaksi, &p.NamaKurir, &p.AlamatTujuan, &p.StatusPengiriman, &p.Ongkir, &p.KdUser, &p.NamaUsers, &p.NamaSeller); err != nil {
                return c.JSON(http.StatusInternalServerError, map[string]string{
                    "message": "Data scan error",
                    "error":   err.Error(),
                })
            }
            results = append(results, p)
        }

        return c.JSON(http.StatusOK, results)
    })

	e.POST("/pengirimann", func(c echo.Context) error {
        var p Pengirimann
        if err := c.Bind(&p); err != nil {
            return c.JSON(http.StatusBadRequest, map[string]string{
                "message": "Invalid request payload",
                "error":   err.Error(),
            })
        }

        kdPengiriman := generateKodePengiriman()
        statusPengiriman := "Perjalanan"

        _, err = db.Exec(`INSERT INTO pengiriman (kd_pengiriman, nama_kurir, alamat_tujuan, kd_transaksi, status_pengiriman, ongkir) VALUES (?, ?, ?, ?, ?, ?)`,
            kdPengiriman, p.NamaKurir, p.AlamatTujuan, p.KdTransaksi, statusPengiriman, 9000)
        if err != nil {
            return c.JSON(http.StatusInternalServerError, map[string]string{
                "message": "Error inserting data",
                "error":   err.Error(),
            })
        }

        return c.JSON(http.StatusCreated, map[string]string{
            "message":          "Pengiriman created successfully",
            "kd_pengiriman":    kdPengiriman,
            "status_pengiriman": statusPengiriman,
        })
    })

	e.GET("/pengirimann/:kd_transaksi", func(c echo.Context) error {
        kdTransaksi := c.Param("kd_transaksi")

        // Query untuk mengambil data pengiriman berdasarkan kd_transaksi tanpa kd_user
        query := `SELECT p.kd_pengiriman, p.kd_transaksi, p.nama_kurir, p.alamat_tujuan, p.status_pengiriman, p.ongkir,
                          u.nama_users, s.nama_seller
                  FROM pengiriman p
                  JOIN transaksi t ON p.kd_transaksi = t.kd_transaksi
                  JOIN users u ON t.kd_user = u.kd_user
                  JOIN seller s ON t.kd_seller = s.kd_seller
                  WHERE p.kd_transaksi = ?`

        var pengiriman Pengirimann
        err := db.QueryRow(query, kdTransaksi).Scan(&pengiriman.KdPengiriman, &pengiriman.KdTransaksi, &pengiriman.NamaKurir,
            &pengiriman.AlamatTujuan, &pengiriman.StatusPengiriman, &pengiriman.Ongkir,
            &pengiriman.NamaUsers, &pengiriman.NamaSeller)
        if err != nil {
            if err == sql.ErrNoRows {
                return c.JSON(http.StatusNotFound, map[string]string{
                    "message": "Pengiriman not found",
                })
            }
            log.Fatal(err)
        }

        // Menghilangkan kd_user dari response
        pengiriman.KdUser = ""

        return c.JSON(http.StatusOK, pengiriman)
    })

	// Endpoint GET /pengirimann_arya_perjalanan
e.GET("/pengirimann_arya_perjalanan", func(c echo.Context) error {
	// Query untuk mengambil data pengiriman dengan status_pengiriman = 'Perjalanan'
	query := `
		SELECT p.kd_pengiriman, p.kd_transaksi, p.nama_kurir, p.alamat_tujuan, p.status_pengiriman, p.ongkir,
			   u.kd_user, u.nama_users, s.nama_seller
		FROM pengiriman p
		JOIN transaksi t ON p.kd_transaksi = t.kd_transaksi
		JOIN users u ON t.kd_user = u.kd_user
		JOIN seller s ON t.kd_seller = s.kd_seller
		WHERE p.status_pengiriman = 'Perjalanan'
	`

	rows, err := db.Query(query)
	if err != nil {
		log.Fatal(err)
	}
	defer rows.Close()

	var pengirimans []Pengirimann
	for rows.Next() {
		var pengiriman Pengirimann
		err := rows.Scan(&pengiriman.KdPengiriman, &pengiriman.KdTransaksi, &pengiriman.NamaKurir,
			&pengiriman.AlamatTujuan, &pengiriman.StatusPengiriman, &pengiriman.Ongkir,
			&pengiriman.KdUser, &pengiriman.NamaUsers, &pengiriman.NamaSeller)
		if err != nil {
			log.Fatal(err)
		}

		pengirimans = append(pengirimans, pengiriman)
	}
	if err := rows.Err(); err != nil {
		log.Fatal(err)
	}

	return c.JSON(http.StatusOK, pengirimans)
})


	e.GET("/pengiriman", func(c echo.Context) error {
		rows, err := db.Query("SELECT id, kd_pengiriman, nama_kurir, kd_user, alamat_tujuan, kd_transaksi, kd_seller FROM pengiriman")
		if err != nil {
			return c.JSON(http.StatusInternalServerError, map[string]string{
				"error": err.Error(),
			})
		}
		defer rows.Close()
	
		var pengirimans []Pengiriman
		for rows.Next() {
			var pengiriman Pengiriman
			if err := rows.Scan(&pengiriman.ID, &pengiriman.Kd_pengiriman, &pengiriman.Nama_kurir, &pengiriman.Kd_user, &pengiriman.Alamat_tujuan, &pengiriman.Kd_transaksi, &pengiriman.Kd_seller); err != nil {
				return c.JSON(http.StatusInternalServerError, map[string]string{
					"error": err.Error(),
				})
			}
			pengirimans = append(pengirimans, pengiriman)
		}
	
		return c.JSON(http.StatusOK, pengirimans)
	})	

	e.GET("/pengiriman/:kd_user", func(c echo.Context) error {
		kd_user := c.Param("kd_user")
		rows, err := db.Query("SELECT id, kd_pengiriman, nama_kurir, kd_user, alamat_tujuan, kd_transaksi, kd_seller, status_pengiriman FROM pengiriman WHERE kd_user = ?", kd_user)
		if err != nil {
			return c.JSON(http.StatusInternalServerError, map[string]string{
				"error": err.Error(),
			})
		}
		defer rows.Close()
	
		var pengirimans []Pengiriman
		for rows.Next() {
			var pengiriman Pengiriman
			if err := rows.Scan(&pengiriman.ID, &pengiriman.Kd_pengiriman, &pengiriman.Nama_kurir, &pengiriman.Kd_user, &pengiriman.Alamat_tujuan, &pengiriman.Kd_transaksi, &pengiriman.Kd_seller, &pengiriman.Status_pengiriman); err != nil {
				return c.JSON(http.StatusInternalServerError, map[string]string{
					"error": err.Error(),
				})
			}
			pengirimans = append(pengirimans, pengiriman)
		}
	
		return c.JSON(http.StatusOK, pengirimans)
	})

	e.PUT("/pengiriman/:kd_user", func(c echo.Context) error {
		kd_user := c.Param("kd_user")
		
		// Mendapatkan data yang ingin diupdate dari body request
		var pengirimanUpdate Pengiriman
		if err := c.Bind(&pengirimanUpdate); err != nil {
			return c.JSON(http.StatusBadRequest, map[string]string{
				"error": "Failed to bind JSON data",
			})
		}
	
		// Query update ke database
		stmt, err := db.Prepare("UPDATE pengiriman SET nama_kurir = ?, alamat_tujuan = ?, kd_transaksi = ?, kd_seller = ?, status_pengiriman = ? WHERE kd_user = ?")
		if err != nil {
			return c.JSON(http.StatusInternalServerError, map[string]string{
				"error": err.Error(),
			})
		}
		defer stmt.Close()
	
		// Eksekusi query dengan parameter dari pengirimanUpdate dan kd_user
		_, err = stmt.Exec(pengirimanUpdate.Nama_kurir, pengirimanUpdate.Alamat_tujuan, pengirimanUpdate.Kd_transaksi, pengirimanUpdate.Kd_seller, pengirimanUpdate.Status_pengiriman, kd_user)
		if err != nil {
			return c.JSON(http.StatusInternalServerError, map[string]string{
				"error": err.Error(),
			})
		}
	
		return c.JSON(http.StatusOK, map[string]string{
			"message": "Update successful",
		})
	})
	
	
	e.POST("/pengiriman", func(c echo.Context) error {
		var pengiriman Pengiriman
		if err := c.Bind(&pengiriman); err != nil {
			return c.JSON(http.StatusBadRequest, map[string]string{
				"error": err.Error(),
			})
		}
	
		pengiriman.Kd_pengiriman = generateKodePengiriman()
	
		if pengiriman.Status_pengiriman == "" {
			pengiriman.Status_pengiriman = "Proses"
		}
	
		_, err := db.Exec("INSERT INTO pengiriman (kd_pengiriman, nama_kurir, kd_user, alamat_tujuan, kd_transaksi, kd_seller, status_pengiriman) VALUES (?, ?, ?, ?, ?, ?, ?)",
			pengiriman.Kd_pengiriman, pengiriman.Nama_kurir, pengiriman.Kd_user, pengiriman.Alamat_tujuan, pengiriman.Kd_transaksi, pengiriman.Kd_seller, pengiriman.Status_pengiriman,
		)
		if err != nil {
			return c.JSON(http.StatusInternalServerError, map[string]string{
				"error": err.Error(),
			})
		}
		return c.JSON(http.StatusCreated, pengiriman)
	})

    e.PUT("/pengiriman/:kd_pengiriman", func(c echo.Context) error {
        kd_pengiriman := c.Param("kd_pengiriman")
        var pengiriman Pengiriman
        if err := c.Bind(&pengiriman); err != nil {
            return c.JSON(http.StatusBadRequest, map[string]string{
                "error": err.Error(),
            })
        }

        _, err := db.Exec("UPDATE pengiriman SET nama_kurir = ?, kd_user = ?, alamat_tujuan = ?, kd_transaksi = ?, kd_seller = ?, status_pengiriman = ? WHERE kd_pengiriman = ?",
            pengiriman.Nama_kurir, pengiriman.Kd_user, pengiriman.Alamat_tujuan, pengiriman.Kd_transaksi, pengiriman.Kd_seller, pengiriman.Status_pengiriman, kd_pengiriman,
        )
        if err != nil {
            return c.JSON(http.StatusInternalServerError, map[string]string{
                "error": err.Error(),
            })
        }
        return c.JSON(http.StatusOK, pengiriman)
    })


	e.GET("/getchat", func(c echo.Context) error {
		rows, err := db.Query("SELECT id, kd_user, tanggal, jam, text_chat FROM chat")
		if err != nil {
			log.Printf("Kesalahan saat mengambil data chat dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal mengambil data chat"})
		}
		defer rows.Close()

		var chats []Chat
		for rows.Next() {
			var chat Chat
			var kdUser string // Menggunakan tipe string untuk kd_user
			var tanggal sql.NullString
			var jam sql.NullString
			if err := rows.Scan(&chat.ID, &kdUser, &tanggal, &jam, &chat.TextChat); err != nil {
				log.Printf("Kesalahan saat memindai data chat dari database: %v\n", err)
				return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal memindai data chat"})
			}
			chat.KDUser = kdUser // Menyimpan nilai langsung ke chat.KDUser
			chat.Tanggal = tanggal.String
			chat.Jam = jam.String
			chats = append(chats, chat)
		}

		if err := rows.Err(); err != nil {
			log.Printf("Kesalahan saat iterasi data chat dari database: %v\n", err)
			return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Gagal iterasi data chat"})
		}

		return c.JSON(http.StatusOK, chats)
	})

	e.POST("/chat", func(c echo.Context) error {
		chat := new(Chat)
		if err := c.Bind(chat); err != nil {
			return err
		}

		// Mengisi kolom yang diperlukan
		chat.Kd_seller = "S01020"
		chat.KdChat = generateKdChat()
		chat.Tanggal = time.Now().Format("2006-01-02")
		chat.Jam = time.Now().Format("15:04:05")

		// Menyimpan data ke dalam database
		query := "INSERT INTO chat (kd_user, kd_seller, kd_chat, tanggal, jam, text_chat) VALUES (?, ?, ?, ?, ?, ?)"
		_, err := db.Exec(query, chat.KDUser, chat.Kd_seller, chat.KdChat, chat.Tanggal, chat.Jam, chat.TextChat)
		if err != nil {
			return err
		}

		// Mengembalikan respon sukses
		return c.JSON(http.StatusCreated, chat)
	})

	e.POST("/chatt", func(c echo.Context) error {
		chat := new(Chat)
		if err := c.Bind(chat); err != nil {
			return err
		}

		// Mengisi kolom yang diperlukan
		chat.KDUser = "0"
		chat.Kd_seller = "S01020"
		chat.KdChat = generateKdChat()
		chat.Tanggal = time.Now().Format("2006-01-02")
		chat.Jam = time.Now().Format("15:04:05")

		// Menyimpan data ke dalam database
		query := "INSERT INTO chat (kd_user, kd_seller, kd_chat, tanggal, jam, text_chat) VALUES (?, ?, ?, ?, ?, ?)"
		_, err := db.Exec(query, chat.KDUser, chat.Kd_seller, chat.KdChat, chat.Tanggal, chat.Jam, chat.TextChat)
		if err != nil {
			return err
		}

		// Mengembalikan respon sukses
		return c.JSON(http.StatusCreated, chat)
	})

	// Endpoint POST untuk membuat transaksi
e.POST("/transaksii_new", func(c echo.Context) error {
    type Transaksi struct {
        Kd_user           string  `json:"kd_user"`
        Kd_barang         string  `json:"kd_barang"`
        Jumlah_barang     int     `json:"jumlah_barang"`
        Total_harga       float64 `json:"total_harga"`
        Metode_pembayaran string  `json:"metode_pembayaran"`
    }

    var transaksi Transaksi
    if err := c.Bind(&transaksi); err != nil {
        return c.JSON(http.StatusBadRequest, map[string]string{"error": "Invalid request"})
    }

    kd_seller := "S01020" // Nilai tetap
    kd_transaksi := "TRX" + time.Now().Format("0601021504") // format dengan panjang 13 karakter (3 untuk TRX dan 10 untuk timestamp)
    tgl_transaksi := time.Now()
    batas_pembayaran := tgl_transaksi.Add(24 * time.Hour)
    status_pembayaran := "Pending" // Nilai tetap

    queryInsert := "INSERT INTO transaksi (kd_user, kd_seller, kd_transaksi, kd_barang, jumlah_barang, total_harga, tgl_transaksi, status_pembayaran, metode_pembayaran, batas_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    _, err := db.Exec(queryInsert, transaksi.Kd_user, kd_seller, kd_transaksi, transaksi.Kd_barang, transaksi.Jumlah_barang, transaksi.Total_harga, tgl_transaksi, status_pembayaran, transaksi.Metode_pembayaran, batas_pembayaran)
    if err != nil {
        log.Printf("Error inserting into database: %v\n", err)
        return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Failed to create transaction"})
    }

    // Query untuk mendapatkan transaksi yang baru saja dibuat
    querySelect := "SELECT * FROM transaksi WHERE kd_transaksi = ?"
    var hasilTransaksi Transaksi
    err = db.QueryRow(querySelect, kd_transaksi).Scan(
        &hasilTransaksi.Kd_user,
        &hasilTransaksi.Kd_barang,
        &hasilTransaksi.Jumlah_barang,
        &hasilTransaksi.Total_harga,
        &hasilTransaksi.Metode_pembayaran,
    )
    if err != nil {
        log.Printf("Error fetching transaction from database: %v\n", err)
        return c.JSON(http.StatusInternalServerError, map[string]string{"error": "Failed to fetch transaction"})
    }

    return c.JSON(http.StatusCreated, hasilTransaksi)
})

	
	e.Logger.Fatal(e.Start(":1323"))
}


