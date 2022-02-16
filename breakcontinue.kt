fun main()
{
    var index: Int = 1

    var students = arrayOf<String>("Steven", "Sefry", "Ricardo", "Kelvin", "Stenly")

    for (student in students)
    {
        if (student == "Ricardo") {
            continue
            // break
        }
        println(student)
    }
}

   // while(index <= 10)
  //  {
        //    if (index == 5)
     //   {
     //       index++ // continue
            // println(index)
     //           continue
            // break
     //   }
     //   println(index)
     //   index++
  //  }
//}