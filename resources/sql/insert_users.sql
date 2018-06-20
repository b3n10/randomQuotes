USE quotes;

-- init values name, email only --
INSERT INTO users (
	usertype,
	password
) VALUES (
	"Guest",
	"guest123"
), (
	"Admin",
	"adm!n23"
);
