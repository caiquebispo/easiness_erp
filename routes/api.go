package main

import (
	"github.com/gorilla/mux"
	"net/http"
)

func setupRoutes() *mux.Router {
	r := mux.NewRouter()

	// v1/auth routes
	authRouter := r.PathPrefix("/v1/auth").Subrouter()
	authRouter.HandleFunc("/login", func(w http.ResponseWriter, r *http.Request) {
		// Handle login
	}).Methods("POST")
	authRouter.HandleFunc("/register", func(w http.ResponseWriter, r *http.Request) {
		// Handle register
	}).Methods("POST")
	authRouter.HandleFunc("/logout", func(w http.ResponseWriter, r *http.Request) {
		// Handle logout
	}).Methods("POST")

	return r
}