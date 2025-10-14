import { Card, CardContent } from "@/components/ui/card"
import { Award, Users, Wrench } from "lucide-react"

export default function AboutPage() {
  return (
    <main className="min-h-screen pt-16">
      <section className="py-12 bg-card border-b border-border">
        <div className="container mx-auto px-4 lg:px-8">
          <h1 className="text-4xl md:text-5xl font-bold mb-4">About Elite Motorcycles</h1>
          <p className="text-lg text-muted-foreground max-w-3xl">
            Your trusted partner in finding the perfect ride since 2010
          </p>
        </div>
      </section>

      <section className="py-20">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
            <div>
              <h2 className="text-3xl font-bold mb-6">Our Story</h2>
              <div className="space-y-4 text-muted-foreground leading-relaxed">
                <p>
                  Founded in 2010, Elite Motorcycles has grown from a small passion project into one of the region's
                  most trusted motorcycle dealerships. Our journey began with a simple mission: to connect riders with
                  their dream machines.
                </p>
                <p>
                  Over the years, we've built lasting relationships with manufacturers, riders, and enthusiasts. Our
                  commitment to quality, transparency, and customer service has made us the go-to destination for
                  motorcycle enthusiasts of all levels.
                </p>
                <p>
                  Today, we offer an extensive selection of premium motorcycles, from high-performance sport bikes to
                  comfortable touring machines, all backed by our comprehensive service and support.
                </p>
              </div>
            </div>
            <div className="relative h-96 rounded-lg overflow-hidden">
              <img src="/motorcycle-showroom-interior-luxury.jpg" alt="Our showroom" className="w-full h-full object-cover" />
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <Card>
              <CardContent className="p-6 text-center">
                <div className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 mb-4">
                  <Award className="h-8 w-8 text-primary" />
                </div>
                <h3 className="text-xl font-bold mb-2">15+ Years</h3>
                <p className="text-muted-foreground">Of excellence in motorcycle sales and service</p>
              </CardContent>
            </Card>

            <Card>
              <CardContent className="p-6 text-center">
                <div className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 mb-4">
                  <Users className="h-8 w-8 text-primary" />
                </div>
                <h3 className="text-xl font-bold mb-2">5,000+</h3>
                <p className="text-muted-foreground">Happy riders and counting</p>
              </CardContent>
            </Card>

            <Card>
              <CardContent className="p-6 text-center">
                <div className="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 mb-4">
                  <Wrench className="h-8 w-8 text-primary" />
                </div>
                <h3 className="text-xl font-bold mb-2">Expert Team</h3>
                <p className="text-muted-foreground">Certified technicians and passionate advisors</p>
              </CardContent>
            </Card>
          </div>
        </div>
      </section>

      <section className="py-20 bg-card">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="max-w-3xl mx-auto text-center">
            <h2 className="text-3xl font-bold mb-6">Our Values</h2>
            <div className="space-y-6 text-left">
              <div>
                <h3 className="text-xl font-semibold mb-2">Quality First</h3>
                <p className="text-muted-foreground leading-relaxed">
                  Every motorcycle in our inventory undergoes rigorous inspection and certification to ensure it meets
                  our high standards.
                </p>
              </div>
              <div>
                <h3 className="text-xl font-semibold mb-2">Customer Focus</h3>
                <p className="text-muted-foreground leading-relaxed">
                  Your satisfaction is our priority. We take the time to understand your needs and help you find the
                  perfect motorcycle.
                </p>
              </div>
              <div>
                <h3 className="text-xl font-semibold mb-2">Transparency</h3>
                <p className="text-muted-foreground leading-relaxed">
                  No hidden fees, no surprises. We believe in honest, straightforward communication throughout your
                  buying journey.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  )
}
