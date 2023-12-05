package main

import (
	"github.com/nerissatbg/task-5-vix-btpns-nerissa/database"
	"github.com/nerissatbg/task-5-vix-btpns-nerissa/router"
)

func main() {
	database.InitDB()
	database.MigrateDB()
	r := router.RouteInit()
	r.Run(":8080")
}
