using System;
using System.Collections.Generic;

// Definición de la clase abstracta Pieza
abstract class Pieza
{
    // Propiedades
    public string Tipo { get; set; }
    public string Tela { get; set; }
    public string Color { get; set; }
    public double Precio { get; set; }
    public string Cliente { get; set; }
    public DateTime FechaEncargo { get; set; }

    // Constructor
    public Pieza(string tipo, string tela, string color, double precio, string cliente, DateTime fechaEncargo)
    {
        Tipo = tipo;
        Tela = tela;
        Color = color;
        Precio = precio;
        Cliente = cliente;
        FechaEncargo = fechaEncargo;
    }

    // Método abstracto para calcular el precio final de la pieza
    public abstract double CalcularPrecio();

    // Método ToString para imprimir la información de la pieza
    public override string ToString()
    {
        return $"{Tipo} en tela {Tela} de color {Color}, precio: ${Precio}, encargado por {Cliente} el {FechaEncargo.ToShortDateString()}";
    }
}

// Definición de la clase Vestido, que hereda de Pieza
class Vestido : Pieza
{
    // Constructor
    public Vestido(string tela, string color, double precio, string cliente, DateTime fechaEncargo)
        : base("Vestido", tela, color, precio, cliente, fechaEncargo)
    {
    }

    // Implementación del método abstracto CalcularPrecio
    public override double CalcularPrecio()
    {
        return Precio * 1.3; // Un 30% de ganancia
    }
}

// Definición de la clase Blusa, que hereda de Pieza
class Blusa : Pieza
{
    // Constructor
    public Blusa(string tela, string color, double precio, string cliente, DateTime fechaEncargo)
        : base("Blusa", tela, color, precio, cliente, fechaEncargo)
    {
    }

    // Implementación del método abstracto CalcularPrecio
    public override double CalcularPrecio()
    {
        return Precio * 1.2; // Un 20% de ganancia
    }
}

// Definición de la clase Traje, que hereda de Pieza
class Traje : Pieza
{
    // Constructor
    public Traje(string tela, string color, double precio, string cliente, DateTime fechaEncargo)
        : base("Traje", tela, color, precio, cliente, fechaEncargo)
    {
    }

    // Implementación del método abstracto CalcularPrecio
    public override double CalcularPrecio()
    {
        return Precio * 1.5; // Un 50% de ganancia
    }
}

// Definición de la clase Falda, que hereda de Pieza
class Falda : Pieza
{
    // Constructor
    public Falda(string tela, string color, double precio, string cliente, DateTime fechaEncargo)
        : base("Falda", tela, color, precio, cliente, fechaEncargo)
    {
    }

    // Implementación del método abstracto CalcularPrecio
    public override double CalcularPrecio()
    {
        return Precio * 1.1; // Un 10% de ganancia
    }
}


class Modista
{
    // Lista de encargos
    private List<Pieza> encargos;

    // Constructor
    public Modista()
    {
        encargos = new List<Pieza>();
    }

    // Método para agregar un encargo a la lista
    public void AgregarEncargo(Pieza pieza)
    {
        encargos.Add(pieza);
    }

    // Método para obtener la cantidad de encargos de color blanco o negro
    public int CantidadEncargosBlancoNegro()
    {
        int cantidad = 0;
        foreach (Pieza pieza in encargos)
        {
            if (pieza.Color == "blanco" || pieza.Color == "negro")
            {
                cantidad++;
            }
        }
        return cantidad;
    }

    // Método para obtener la suma total de los precios de los encargos
    public double SumaTotalPreciosEncargos()
    {
        double suma = 0;
        foreach (Pieza pieza in encargos)
        {
            suma += pieza.Precio;
        }
        return suma;
    }

    // Método para obtener el promedio de ingresos por tipo de pieza
    public Dictionary<string, double> PromedioIngresosPorTipoPieza()
    {
        Dictionary<string, double> promedios = new Dictionary<string, double>();
        Dictionary<string, int> cantidades = new Dictionary<string, int>();
        foreach (Pieza pieza in encargos)
        {
            if (!promedios.ContainsKey(pieza.Tipo))
            {
                promedios[pieza.Tipo] = 0;
                cantidades[pieza.Tipo] = 0;
            }
            promedios[pieza.Tipo] += pieza.CalcularPrecio();
            cantidades[pieza.Tipo]++;
        }
        foreach (string tipo in promedios.Keys.ToList())
        {
            promedios[tipo] /= cantidades[tipo];
        }
        return promedios;
    }

    // Método para verificar si hay piezas a realizar en la tela 'Satén'
    public bool HayPiezasEnTelaSaten()
    {
        foreach (Pieza pieza in encargos)
        {
            if (pieza.Tela == "Satén")
            {
                return true;
            }
        }
        return false;
    }
}