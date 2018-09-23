pragma solidity ^0.4.24;

contract Persona {
	
	//constructor
	
	struct Person {
		string name;
		string lastname;
		string birthplace;
		uint8 birth_year;
		uint8 birth_month;
		uint8 birth_day;
		address registrante;
		address univeral_address;
		uint8 registrationDate;
        string photo;
	}
	Person person;
	
	constructor() public {}
	function registerPerson (string _name, string _lastname, string _birthplace , uint8 _year, uint8 _month, uint8 _day, address _uaddress, string _photo) public returns(string) {
			person.name = _name;
			person.lastname = _lastname;
			person.birthplace = _birthplace;
			person.birth_year = _year;
			person.birth_month = _month;
			person.birth_day = _day;
			person.univeral_address = _uaddress;
            person.registrante = msg.sender;
            person.photo = _photo;
			return"Persona registrada correctamente.";
		}
	}
	//struct
	//Nombre
	//Fecha de nacimiento
	//Genero
	//Tutores
	//Tiempo que nacio
	//Direccion universal
	//funcion registerPerson()
