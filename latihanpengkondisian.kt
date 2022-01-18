/* a > b
   *  a <= b
   * a >= b
   * a > b
   * a == b
   * a ! = b
   * !b
   * */
fun main(){

    var a = 51

    if(a <= 50) {
        println("failed")
    }  else if(a <=65) {
        println("Grade C")
    } else if(a <=70) {
        println("Grade B-")
    } else if(a <=80) {
        println("Grade B")
    } else if(a <=90) {
        println("Grade A-")
    }  else if(a <= 100) {
        println("Grade A")
    }
}
