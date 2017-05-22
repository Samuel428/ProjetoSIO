using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Primavera_Sio.Lib_Primavera.Model
{
    public class Artigo
    {
        public string CodArtigo
        {
            get;
            set;
        }

        public string DescArtigo
        {
            get;
            set;
        }

        public string UnidadeBase
        {
            get;
            set;
        }

        public double Quantidade
        {
            get;
            set;
        }

        public DateTime DataCriacao
        {
            get;
            set;
        }

        public string Iva
        {
            get;
            set;
        }

        public string UnidadeVenda { get; set; }
        public string MovStock { get; set; }
        public string ArmazemSugestao { get; set; }
        public string preco { get; set; }
        public string Marca { get; set; }
        public string imagem { get; set; }
    }
}