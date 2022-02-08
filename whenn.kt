fun main()
{
    val day = 6 //tipe int

    val hari = when(day)
    {
        in 1 .. 1-> "Libur"
        2-> "Senin"
        3-> "Selasa"
        4-> "Rabu"
        5-> "Kamis"
        6-> "Jumat""
        else
        7-> "Sabtu-> "hari tidak ada"
    }

    println(hari)
}