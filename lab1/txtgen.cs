using System;
using System.IO;
using System.Text;
namespace txtgenerator
{
    class Program
    {
        static string strGen()
        {
            var rand = new Random();
            var value = rand.Next(-10, 10);
            if (value < 10)
            {
                if (value % 2 == 0)
                    return "negative even";
                else return "negative odd";
            }
            else
                if (value % 2 == 0)
                return "positive even";
            else return "positive odd";
        }
        static void Main(string[] args)
        {
            const int N = 1000;
            StreamWriter f = new StreamWriter("sometext.txt");
            for (var i = 0; i < N; i++)
            {
                f.WriteLine(strGen());
            }
            f.Close();
        }

    }
}
